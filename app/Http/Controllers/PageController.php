<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view( 'homepage' );
    }
    /**
     * Show the page
     */
    public function page( $slug ): View
    {
        $page = DB::table('posts')->where('slug', $slug )->paginate(15);

        if ( count( $page ) == 0 ) {
            return view('404');
        }
        return view('post', [
            'page'  => $page->count() === 1 ? $page[ 0 ] : null,
            'pages' => $page->count() === 1 ? null : $page,
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

        $posts = DB::table('posts')->where('category_id', $category->id )->where('status', 1 )->paginate( 12 );
        if ( count( $posts ) == 0 ) {
            return view('404');
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
        $posts = DB::table('posts')->where('category_id', $category->id )->where('status', 1 )->paginate( 12 );

        if ( count( $posts ) == 0 ) {
            return view('404');
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
