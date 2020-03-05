<?php

namespace App\Http\Controllers;

use App\KassaLog;
use App\Product;
use App\Sale;
use App\SaleLines;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KassaController extends Controller
{
    public function index()
    {
        return view('kassa.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $user = User::where('username', 'like', '%'.$search.'%')->first();
        return view('kassa.manageBalance', ['user' => $user]);
    }

    public function displayBalance(User $user)
    {
        return view('kassa.manageBalance', ['user' => $user]);
    }

    public function logs()
    {
        $logs = KassaLog::all();
        return view('kassa.logs', ['logs' => $logs]);
    }

    public function deposit(User $user)
    {
        $products = Product::all();
        return view('kassa.deposit', ['user' => $user]);
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

        $lineData = [
            'product_id' => 1,
            'amount' => 1,
            'price' => $validatedAttributes['amount']
        ];

        $user->balance = $user->balance + $validatedAttributes['amount'];
        $user->save();
        Sale::create($saleData);
        SaleLines::create($lineData);

        return redirect(route('kassa.displayBalance', $user->id));
    }

    public function order(User $user)
    {
        $products = Product::skip(1)->take(Product::count() - 1)->get();
        return view('kassa.order', [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function placeOrder(Request $request, User $user)
    {
        $data = $request->validate([
            'orderedProducts' => 'array',
            'orderedProducts.*' => 'exists:products,id'
        ]);

        foreach ($data['orderedProducts'] as $orderedProduct) {
            $product = Product::find($orderedProduct);

        }

        /*if (($user->balance - ($request['price'] * $validatedAttributes['amount'])) < 0)
        {
            $products = Product::all();
            $failed = true;
            return view('kassa.order', [
                'products' => $products,
                'user' => $user,
            ])->with('failed', $failed);
        }
        else
        {
            $user->balance = $user->balance - ($request['price'] * $validatedAttributes['amount']);
            $user->save();

            /*DB::table('kassa_logs')->insert([
                'user_id' => $user->id,
                'product_id' => $request['id'],
                'amount' => ($request['price'] * $validatedAttributes['amount']) * -1,
                'balance' => $user->balance
            ]);*//*
            $logData = [
                'user_id' => $user->id,
                'product_id' => $request['id'],
                'amount' => ($request['price'] * $validatedAttributes['amount']) * -1,
                'balance' => $user->balance
            ];

            KassaLog::create($logData);
        }

        $info = [
            'name' => $request['name'],
            'price' => ($request['price'] * $validatedAttributes['amount']),
            'amount' => $validatedAttributes['amount']
        ];

        return view('kassa.manageBalance', ['user' => $user])->with('info', $info);*/
    }
}
