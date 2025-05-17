<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use App\Interface\PostRepositoryInterface;
use App\Interface\PostTagRepositoryInterface;
use App\Interface\PostCategoryRepositoryInterface;
use App\Interface\PractitionerDocumentRepositoryInterface;
use App\Interface\ServiceRepositoryInterface;
use App\Interface\ServiceCategoryRepositoryInterface;
use App\Repositories\PractitionerDocumentRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ServiceCategoryRepository;
use App\Repositories\PostTagRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use CodexShaper\Menu\Http\Controllers\MenuController as PackageMenuController;
use App\Http\Controllers\Admin\Menus\MenuController as CustomMenuController;

use CodexShaper\Menu\Http\Controllers\MenuItemController as PackageMenuItemController;
use App\Http\Controllers\Admin\Menus\MenuItemController as CustomMenuItemController;


use CodexShaper\Menu\Http\Controllers\Controller as PackageController;
use App\Http\Controllers\Admin\Menus\Controller as CustomController;

use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind PostRepositoryInterface to PostRepository
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PostTagRepositoryInterface::class, PostTagRepository::class);
        $this->app->bind(PostCategoryRepositoryInterface::class, PostCategoryRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(ServiceCategoryRepositoryInterface::class, ServiceCategoryRepository::class);
        $this->app->bind(PractitionerDocumentRepositoryInterface::class, PractitionerDocumentRepository::class);

    }
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('emails.installment_reminder', function ($view) {
            if ($view !== null) {
                $name = $view->getName();

            } else {
                Log::error('View object is null in AppServiceProvider');
            }
        });

        $this->app->bind(PackageMenuController::class, CustomMenuController::class);
        $this->app->bind(PackageMenuItemController::class, CustomMenuItemController::class);
        // $this->app->bind(PackageController::class, CustomController::class);

    }
}
