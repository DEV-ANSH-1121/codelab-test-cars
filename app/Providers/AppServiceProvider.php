<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Kyslik\ColumnSortable\Sortable;

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
        Paginator::useBootstrapFour();

        // Configure default query string names for column sorting
        config(['columnsortable.default_first_column' => false]);
        config(['columnsortable.default_direction' => 'asc']);
        config(['columnsortable.uri_relation_column_separator' => '.']);
    }
}
