<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $cart = session()->get('cart', []);
    $products = Product::whereIn('id', $cart)->get();
    return view('cart.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $cart = session()->get('cart', []);
    $product_id = $request->input('product_id');
    $cart[] = $product_id;
    session()->put('cart', $cart);
    return redirect();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    public function update(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (!in_array($id, $cart)) {
        return redirect()->back()->with('error', 'Product not found in cart');
    }

    $quantity = $request->input('quantity');
    $product = Product::find($id);

    if ($quantity > $product->stock) {
        return redirect()->back()->with('error', 'Not enough stock');
    }

    $cart[$id] = [        'quantity' => $quantity,        'total' => $quantity * $product->price    ];

    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Cart updated');
}

public function destroy($id)
{
    $cart = session()->get('cart', []);

    if (!in_array($id, $cart)) {
        return redirect()->back()->with('error', 'Product not found in cart');
    }

    unset($cart[$id]);
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Product removed from cart');
}

}
