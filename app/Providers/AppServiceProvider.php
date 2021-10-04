<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $categories = Category::get();
        View::share(['categories' => $categories]);

        $posts = Post::get();
        View::share(['posts' => $posts]);

        $users = User::get();
        View::share(['users' => $users]);

        Blade::directive('menuActive', function ($path){
            return "<?php echo Request::path() == $path ? 'active' : ''; ?>";
        });

        Blade::directive('adminActive', function ($route){
            return "<?php echo Route::currentRouteName($route) ? 'admin_active' : ''; ?>";
        });

        Blade::directive('menuOpen', function ($route){
            return "<?php echo Route::currentRouteName($route) ? 'menu-open' : ''; ?>";
        });
    }
}
