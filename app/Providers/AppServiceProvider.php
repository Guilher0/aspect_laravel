<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance;

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
        View::composer(['partials._header', 'partials._footer'], function (ViewInstance $view) {
            static $navItems = null;

            if ($navItems === null) {
                $navItems = [
                    ['id' => 'home', 'label' => 'Home', 'href' => route('home'), 'order' => 0],
                    ['id' => 'about', 'label' => 'About', 'href' => route('about'), 'order' => 1],
                    ['id' => 'projects', 'label' => 'Projects', 'href' => route('projects'), 'order' => 2],
                    ['id' => 'contact', 'label' => 'Contact', 'href' => route('contact'), 'order' => 3],
                ];
            }

            $view->with('navItems', $navItems);
        });
    }
}
