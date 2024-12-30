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
            $categories = DB::table('categories')->select('id', 'slug', 'name')->where('parent_id', 0 )->orderBy('updated_at', 'DESC')->get()->toArray();
            $categories = json_decode(json_encode($categories), true);

            if ( count( $categories ) > 0 ) {
                foreach( $categories as $key => $cat ){
                    $categories[ $key ][ 'sub' ] = DB::table('categories')->select('slug', 'name')->where('parent_id', $cat['id'] )->orderBy('updated_at', 'DESC')->get()->pluck('name', 'slug')->toArray();
                }
            }

            view()->share('categories', $categories );
        }
    }
}
