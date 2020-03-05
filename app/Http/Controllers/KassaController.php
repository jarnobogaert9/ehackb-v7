<?php

namespace App\Http\Controllers;

use App\KassaLog;
use App\Product;
use App\User;
use Illuminate\Http\Request;

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

    public function update(Request $request, User $user)
    {
        $validatedAttributes = request()->validate([
            'amount' => 'required',
        ]);

        $user->balance = $user->balance + $validatedAttributes['amount'];
        $user->save();

        $logData = [
            'user_id' => $user->id,
            'product_id' => 999999,
            'amount' => $validatedAttributes['amount'],
            'balance' => $user->balance
        ];

        KassaLog::create($logData);

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

        $user->balance = $user->balance + $validatedAttributes['amount'];
        $user->save();

        $logData = [
            'user_id' => $user->id,
            'product_id' => 999999,
            'amount' => $validatedAttributes['amount'],
            'balance' => $user->balance
        ];

        KassaLog::create($logData);

        return redirect(route('kassa.displayBalance', $user->id));
    }

    public function order(User $user)
    {
        $products = Product::all();
        return view('kassa.order', [
            'products' => $products,
            'user' => $user
        ]);
    }

    public function placeOrder(Request $request, User $user)
    {
        $validatedAttributes = request()->validate([
            'amount' => 'required',
        ]);

        if (($user->balance - ($request['price'] * $validatedAttributes['amount'])) < 0)
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
            ]);*/
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

        return view('kassa.manageBalance', ['user' => $user])->with('info', $info);
    }
}
