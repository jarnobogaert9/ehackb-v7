<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sale;
use App\SaleLines;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    public function index()
    {
        return view('admin.sales', ['sales' => Sale::latest()->get()]);
    }

    public function searchIndex(Request $request){
        return view('sales.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $user = User::where('username', 'like', '%'.$search.'%')->first();
        return view('sales.manageAccount', ['user' => $user]);
    }

    public function manageAccount(User $user)
    {
        return view('sales.manageAccount', ['user' => $user]);
    }

    public function deposit(User $user)
    {
        return view('sales.deposit', ['user' => $user]);
    }

    public function storeMoney(Request $request, User $user)
    {
        $validatedAttributes = request()->validate([
            'amount' => 'required',
        ]);

        $saleData = [
            'cashier_id' => Auth::user()->id,
            'user_id' => $user->id,
            'price' => $validatedAttributes['amount'],
            'old_balance' => $user->balance,
            'new_balance' => $user->balance + $validatedAttributes['amount']
        ];

        $user->balance += $validatedAttributes['amount'];
        $user->save();
        $sale = Sale::create($saleData);

        SaleLines::create([
            'sale_id' => $sale->id,
            'product_id' => 1,
            'amount' => 1,
            'price' => $validatedAttributes['amount']
        ]);

        return view('sales.manageAccount', ['user' => $user]);
    }

    public function order(User $user)
    {
        return view('sales.order', [
            'products' => Product::skip(1)->take(Product::count() - 1)->get(),
            'user' => $user
        ]);
    }

    public function storeOrder(Request $request, User $user)
    {
        $data = $request->validate([
            'orderedProducts' => 'array',
            'orderedProducts.*' => 'exists:products,id'
        ]);

        $totPrice = 0;
        $products = [];

        foreach ($data['orderedProducts'] as $orderedProduct) {
            $product = Product::find($orderedProduct);
            $totPrice += $product->price;
            if (array_key_exists($product->id, $products)){
                $products[$product->id]->amount++;
            }
            else{
                $product->amount = 1;
                $products[$product->id] = $product;
            }
        }

        if ($user->balance - $totPrice < 0)
        {
            return view('kassa.order', [
                'products' => Product::all(),
                'user' => $user,
            ])->with('failed', true);
        }
        else
        {
            $saleData = [
                'cashier_id' => Auth::user()->id,
                'user_id' => $user->id,
                'price' => -$totPrice,
                'old_balance' => $user->balance,
                'new_balance' => $user->balance - $totPrice
            ];

            $user->balance -= $totPrice;
            $user->save();
            $sale = Sale::create($saleData);

            foreach ($products as $currProd){
                SaleLines::create([
                    'sale_id' => $sale->id,
                    'product_id' => $currProd->id,
                    'amount' => $currProd->amount,
                    'price' => $currProd->price * $currProd->amount
                ]);
            }
        }

        return view('sales.manageAccount', ['user' => $user]);
    }
}
