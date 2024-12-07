<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ( Schema::hasTable( 'categories' ) ) {
            // view()->share('categories', DB::table('categories')->select( 'slug', 'name' )->where('parent_id', 0 )->get() );
            view()->share('categories', [ 'News' => 'news', 'Product' => 'product' ] );
        }
    }
}
