<?php

namespace Codelayer\StudentValidator;

use Illuminate\Support\ServiceProvider;

class StudentValidatorServiceProvider extends ServiceProvider
{
    /**
     * Boot the package services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/student-validator'),
        ]);

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'student-validator');
    }

    /**
     * Register the package services.
     */
    public function register()
    {
        $this->app->singleton('student-validator', EduDomain::class);
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'student-validator',
        ];
    }
}
