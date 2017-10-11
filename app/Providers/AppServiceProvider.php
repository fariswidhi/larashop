<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Cart;
use Auth;
use App\UserTransaction;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(60);
        $cat = Category::all();
        // $UserTransaction = UserTransaction::where('id_user',Auth::user()->id);
        // Auth::user()->check();
        view()->share('cats',$cat);
        // view()->share('UserTransaction',$UserTransaction);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
