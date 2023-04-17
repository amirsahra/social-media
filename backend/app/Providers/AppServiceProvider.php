<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\PersonalAccessToken as SanctumPersonalAccessToken;
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
        // Loader Alias
        $loader = AliasLoader::getInstance();
        // SANCTUM CUSTOM PERSONAL-ACCESS-TOKEN
        $loader->alias(PersonalAccessToken::class, SanctumPersonalAccessToken::class);


        // api result
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
