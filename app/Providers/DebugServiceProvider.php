<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class DebugServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (config('app.db_debug', false)) {
            DB::listen(function ($query): void {
                $position = 0;
                $full_query = '';

                foreach (str_split($query->sql) as $char) {
                    if ($char === '?') {
                        $full_query = $full_query . '"' .
                            $query->bindings[$position] . '"';
                        $position++;
                    } else {
                        $full_query .= $char;
                    }
                }

                logger()->debug(" ---> QUERY DEBUG: ${full_query} <---\n");
            });
        }
    }
}
