<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Articel;
use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NavbarCategory extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('depan.layouts.navbar', function ($view) {
      
            $categories = Category::whereHas('articel', function ($query) {
                $query->where('status','publish');
            })->withCount(['articel' => function($query) {
                $query->where('status','publish');
            }])->latest()->get();
        $view->with('categories', $categories);
    });
          View::composer('depan.layouts.widget', function ($view) {
        $post_populer = Articel::orderBy('views', 'desc')->take(3)->get();
        $view->with('post_populer', $post_populer);
    });
          View::composer('depan.layouts.widget', function ($view) {
        $categories = Category::latest()->latest()->get();
        $view->with('categorys', $categories);
    });
    }
}
