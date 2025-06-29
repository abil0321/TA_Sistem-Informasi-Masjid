<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Policies\RolePolicy;
use App\Policies\PermissionPolicy;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    Role::class => RolePolicy::class,
    Permission::class => PermissionPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    $this->registerPolicies();

    // Definisikan Gates tambahan jika diperlukan
    Gate::define('edit-settings', function ($user) {
      return $user->hasPermissionTo('edit-settings');
    });

    Gate::define('edit-settings', function ($user) {
      return $user->hasPermissionTo('edit-settings');
    });
  }
}
