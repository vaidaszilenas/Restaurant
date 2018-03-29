<?php

namespace App\Providers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Cart;
use App\Helpers\CartHelper;

class ViewSharingProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
      View::composer('*', function ($view){

        $cartHelper = new CartHelper;
        // $cartHelper->cartCounter();

        $view->with('cartSize', $cartHelper->getCount());

        $view->with('cartTotal', $cartHelper->getTotal());

        $view->with('subTotal', $cartHelper->subTotal());

        $view->with('vatTotal', $cartHelper->vatTotal());
      });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
