<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\IGroupRepository',
            'App\Repositories\GroupRepository'
        );
        $this->app->bind(
            'App\Repositories\IStudentRepository',
            'App\Repositories\StudentRepository'
        );
        $this->app->bind(
            'App\Repositories\ISubjectRepository',
            'App\Repositories\SubjectRepository'
        );
        $this->app->bind(
            'App\Repositories\IAttendanceRepository',
            'App\Repositories\AttendanceRepository'
        );
    }
}
