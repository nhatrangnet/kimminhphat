<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        //get feature post
        $features = DB::table('posts')->select('slug', 'thumbnail')->where('feature', 1 )->orderBy('updated_at', 'DESC')->get(10)->pluck('thumbnail', 'slug')->toArray();

        return view( 'homepage', [
            'features' => $features
        ] );
    }
    /**
     * Show the page
     */
    public function page( $slug ): View
    {
        $page = DB::table('posts')->where('slug', $slug )->latest('updated_at')->paginate(15);

        if ( count( $page ) == 0 ) {
            return view('404');
        }

        if ( $page->count() === 1 ) {
            switch( $slug ) {
                case 'contact':
                    return view('contact', [
                        'post'  => $page[ 0 ]
                    ]);
                    break;
                default:
                    return view('post', [
                        'post'  => $page[ 0 ]
                    ]);
            }
        }

        return view('posts', [
            'pages' => $page,
        ]);
    }

     /**
     * Show list posts in category
     */
    public function category( $slug ): View
    {
        $category = DB::table('categories')->select( 'id', 'name' )->where('slug', $slug)->first();
        if ( empty( $category ) ) {
            return view('404');
        }

        $posts = DB::table('posts')->where('category_id', $category->id )->where('status', 1 )->latest('updated_at')->paginate( 12 );
        if ( count( $posts ) == 0 ) {
            return view('404');
        }

        if( count( $posts ) === 1 ) {
            return view('post', [
                'post' => $posts[ 0 ],
            ]);
        }

        return view('posts', [
            'title' => $category->name,
            'posts' => $posts,
        ]);
    }

    public function customers(): View
    {
        $category = DB::table('categories')->select( 'id', 'name' )->where('slug', 'customer')->first();
        if ( empty( $category ) ) {
            return view('404');
        }
        $posts = DB::table('posts')->where('category_id', $category->id )->where('status', 1 )->latest('updated_at')->paginate( 12 );

        if ( count( $posts ) == 0 ) {
            return view('404');
        }

        if( count( $posts ) === 1 ) {
            return view('post', [
                'post' => $posts[ 0 ],
            ]);
        }

        return view('posts', [
            'title' => $category->name,
            'posts' => $posts,
        ]);
    }

    public function customer( $slug ): View
    {
        $post = DB::table('posts')->where('slug', $slug )->where('status', 1 )->first();

        if ( empty( $post ) ) {
            return view('404');
        }

        return view('post', [
            'post' => $post,
        ]);
    }
}
