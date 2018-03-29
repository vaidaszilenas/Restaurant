<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\Dish;
use App\Cart;
Use App\User;
use WebToPay;
use Illuminate\Http\Request;
use App\Helpers\CartHelper;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order', [
          'orders' => $orders
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



      // $session = $request->session();
      // $status = $session->flash('status', 'You have successfully placed an order');
      $this->user = Auth::user();
      $tax_amount = new CartHelper;
      $tax_amount = $tax_amount -> vatTotal();

      $getTotal = new CartHelper;
      $getTotal = $getTotal -> getTotal();

      $post = [
        'users_id'=>$this->user->id,
        'tax_amount'=>$tax_amount,
        'total_amount'=>$getTotal
      ];

      $dishes = Cart::where('token', csrf_token())->whereNull('order_id')->get();



    if (count($dishes) ==  0) {
      // dump(count($order));
      return redirect()->to('dishes');
    }
    else {
      $order = Order::create($post);
      foreach ($dishes as $cart) {
        $cart->order_id = $order->id;
        $cart->save();
      }
      try {
      $request = WebToPay::redirectToPayment(array(
          'projectid'     => env('PAYSERA_ID'),
          'sign_password' => env('PAYSERA_PW'),
          'orderid'       => $order->id,
          'amount'        => $getTotal*100,
          'currency'      => 'EUR',
          'country'       => 'LT',
          'accepturl'     => route('accept'),
          'cancelurl'     => route('cancel'),
          'callbackurl'   => route('callback'),
          'test'          => 1,
      ));
    } catch (WebToPayException $e) {
      // handle exception
      }
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
