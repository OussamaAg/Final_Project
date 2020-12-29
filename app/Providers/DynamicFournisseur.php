<?php
namespace App\Providers;
use App\fournisseur; // write model name here 
use Illuminate\Support\ServiceProvider;
class DynamicFournisseur extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('nom', fournisseur::all());
        });
    }

}