<?php

use Illuminate\Support\ServiceProvider;

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
        // Default string length for validation
        \Illuminate\Validation\Rule::defaults('string', 'max:255');
        
        // Default date format
        \Carbon\Carbon::setToStringFormat('Y-m-d H:i:s');
    }
}