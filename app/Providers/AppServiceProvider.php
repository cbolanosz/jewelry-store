<?php

namespace App\Providers;

use App\Contracts\SalesReportGenerator;
use App\Reports\ExcelSalesReportGenerator;
use App\Reports\PdfSalesReportGenerator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SalesReportGenerator::class, function () {
            if (request()->route('format') === 'excel') {
                return new ExcelSalesReportGenerator;
            }

            return new PdfSalesReportGenerator;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
