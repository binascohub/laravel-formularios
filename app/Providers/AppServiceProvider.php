<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;
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
        \Validator::extend('document_number', function(
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            $documentValidator = $parameters[0] == 'cpf' ? new Cpf() : new Cnpj();

            return $documentValidator->isValid($value);
        });
    }
}
