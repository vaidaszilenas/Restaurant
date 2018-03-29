<?php
namespace App\Helpers;
use App\Cart;


class CartHelper
{

  public function getCount()
  {
    $dishes = Cart::where('token', csrf_token())->whereNull('order_id')->get(); //paima is carto tik tuos elementus kuriu order id yra NULL
    return count($dishes);

    $counter = 0;
    foreach ($dishes as $key => $value) {
      $price = $value->dishes->price;
      $counter += $price;
    }


  }

  public function getTotal()
  {
    $dishes = Cart::where('token', csrf_token())->whereNull('order_id')->get();

    $counter = 0;
    foreach ($dishes as $key => $value) {
      $price = $value->dishes->price;
      $counter += $price;
    }
    return $counter;
    dd($counter);
  }

  public function subTotal()
  {
    $VAT = 21;
    $subsum = $this->getTotal();
    $subtotal = $subsum * (1 - $VAT/100);
    return $subtotal;
  }

  public function vatTotal()
  {
    $VAT = 21;
    $subsum = $this->getTotal();
    $subtotal = $subsum * $VAT/100;
    return $subtotal;
  }

}



?>
