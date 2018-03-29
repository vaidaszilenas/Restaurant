<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Dish;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $cart = Cart::where('token', csrf_token())->whereNull('order_id')->get();
      return view('cart/cart', [
        'cart' => $cart
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        $post = [
          'dishes_id'=>$request['dishes_id'],
          'token'=>$request['_token']
        ];
        $cart = Cart::create($post);
        $dish = Dish::where('id', $request['dishes_id'])->first();

        $cart->price = $dish->price; // REMEMBER

        echo json_encode($cart);
        //
        // return redirect()->route('cart-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishes = Cart::where('token', csrf_token())->whereNull('order_id')->get();
        return view('cart/cart', [
          'dishes' => $dishes
        ]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart::destroy($id);
        return redirect()->to('cart');
    }

}
