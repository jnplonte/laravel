<?php

namespace App\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

use Auth;
use Hash;

class CustomValidationServiceProvider extends ServiceProvider {
	public function boot(){
		Validator::extend('check_old_password', function($attribute, $value, $parameters) {
			if (Auth::user()) {
				$user = Auth::user()->getOriginal();
				if ( Hash::check($value, $user['password']) ) {
					return true;
				}else{
					return false;
				}
			}else {
				return false;
			}
    });
	}

	public function register(){

	}
}
