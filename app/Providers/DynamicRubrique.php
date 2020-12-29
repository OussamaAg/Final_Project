<?php
namespace App\Providers;
use App\rubrique; // write model name here 
use Illuminate\Support\ServiceProvider;
class DynamicRubrique extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('intitule', rubrique::all());
        });
    }

}
