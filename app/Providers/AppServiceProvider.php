<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Mainsettings;
use App\Realestatecategory;
use App\Realestate;
use App\Projectcategory;
use App\News;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $allmainsettings=Mainsettings::first();
        $categories=Realestatecategory::all();
        $categoryForSale=Realestate::where('type', 'sale')->selectRaw('cat_id')->groupBy('cat_id')->get();
        $categoryForRent=Realestate::where('type', 'rent')->selectRaw('cat_id')->groupBy('cat_id')->get();
        $news = News::latest()->take(10)->get();

        $Data['allmainsettings']=$allmainsettings;
        $Data['categories']=$categories;
        $Data['categoryForSale']=$categoryForSale;
        $Data['categoryForRent']=$categoryForRent;
        $Data['news']=$news;

        $allprojectscategory=Projectcategory::whereActive(1)->get();
        View::share('allprojectscategory', $allprojectscategory);

        View::share('Dataa', $Data);
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
