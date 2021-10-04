<?php

namespace App\Providers;


use App\Http\Directives\MyDirectives;
use App\Http\Helpers\MySecondHelper;
use App\Http\Helpers\MySuperHelper;
use App\Http\Interfaces\MyDirectivesInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('showPost', function (){
            $class = MyDirectivesInterface::class;
            return "<?php echo App::make('$class')->execute(); ?>";
        });

        Blade::directive('mySecondDirectives', function ($post){
            $class = 'mySecondClass';
            return "<?php echo App::make('$class')->getResult($post); ?>";
        });
    }
    public function register()
    {
        $this->app->bind(MyDirectivesInterface::class,MyDirectives::class);
        $this->app->bind('mySuperClass',MySuperHelper::class);
        $this->app->singleton('mySecondClass',MySecondHelper::class);
    }
}
