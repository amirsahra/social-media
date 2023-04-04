<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
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
        // ide helper
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('apiResult', function (
            string $message, array $data = null, bool $success = true, int $status = 200
        ) {
            return Response::json([
                'success' => $success,
                'status' => $status,
                'message' => $message,
                'data' => $data ?? [],
            ], $status);
        });
    }
}
