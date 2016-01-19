<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout', function ($view) {

            // RECUPERATION DES CATEGORIES PAR ORDRE CROISSANT DE POSITION

            // ENVOYER LE RESULTAT DANS UNE VARIABLE "globalNavCategorie" AFIN D'Y ACCEDER DANS LE LAYOUT.BLADE.PHP

            $view->with('globalNameSite', 'monsupersite.com');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
