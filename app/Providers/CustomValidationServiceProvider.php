<?php

//jnpl test

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider {
	public function boot(){
		Validator::extend('check_validation', function($attribute, $value, $parameters) {
        return false;
    });
	}

	public function register(){

	}
}
