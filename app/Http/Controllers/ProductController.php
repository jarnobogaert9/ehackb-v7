<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function admin_index()
    {
        return view('admin.products',['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png|max:10000',
            'price' => 'required',
        ]);

        if ($request->file('photo')->isValid())
        {
            $fileName = time().".".$request->photo->extension();
            $request->photo->move(public_path('imgs/products'), $fileName);

            $validatedAttributes['photo'] = $fileName;
        }

        if (!empty($request->quantity))
        {
            $validatedAttributes['quantity'] = $request->quantity;
            $validatedAttributes['sold'] = 0;
        }

        Product::create($validatedAttributes);

        $saved = true;
        return redirect()
            ->route('adminpanel.products')
            ->with('saved', $saved);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedAttributes = request()->validate([
            'name' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:10000',
            'price' => 'required',
        ]);

        if (isset($request['photo']))
        {
            if ($request->file('photo')->isValid())
            {
                $fileName = time().".".$request->photo->extension();
                $request->photo->move(public_path('imgs/products'), $fileName);

                $validatedAttributes['photo'] = $fileName;
            }
        }
        else
        {
            $validatedAttributes['photo'] = $product['photo'];
        }

        if (isset($request->quantity))
        {
            $validatedAttributes['quantity'] = $request->quantity;
        }

        if (isset($request->sold))
        {
            $validatedAttributes['sold'] = $request->sold;
        }


        $product->update($validatedAttributes);
        $updated = true;
        return redirect()
            ->route('adminpanel.products')
            ->with('updated', $updated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $deleted = true;
        return redirect()
            ->route('adminpanel.products')
            ->with('deleted', $deleted);
    }
}
