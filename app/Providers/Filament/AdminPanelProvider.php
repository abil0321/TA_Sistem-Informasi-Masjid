<?php

namespace App\Providers\Filament;

use Althinect\FilamentSpatieRolesPermissions\Resources\PermissionResource;
use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Filament\Pages\Auth\LoginCustom;
use App\Filament\Resources\KategoriKegiatanResource;
use App\Filament\Resources\KategoriPengumumanResource;
use App\Filament\Resources\KategoriTransaksiResource;
use App\Filament\Resources\TransaksiKeuanganResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\DonasiResource;
use App\Filament\Resources\KegiatanResource;
use App\Filament\Resources\UserResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use App\Filament\Resources\PengumumanResource;
use Illuminate\Support\Facades\View;
use App\Filament\Widgets\TotalOverview;
use App\Filament\Widgets\KeuanganOverview;
use App\Filament\Widgets\SaldoChart;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName(fn() => View::make('filament.pages.brand'))
            // ->brandLogo('/assets/img/logo.png')
            ->login(LoginCustom::class)
            ->userMenuItems([
                MenuItem::make()
                    ->label('Dashboard')
                    ->url(fn(): string => Dashboard::getUrl())
                    ->icon('heroicon-o-chart-pie'),
            ])
            ->profile()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            // ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                TotalOverview::class,
                KeuanganOverview::class,
                SaldoChart::class,
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn() => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn() => Dashboard::getUrl()),
                        ]),
                    NavigationGroup::make('Kategori')
                        ->items([
                            ...KategoriKegiatanResource::getNavigationItems(),
                            ...KategoriPengumumanResource::getNavigationItems(),
                            ...KategoriTransaksiResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('Resources')
                        ->items([
                            ...PengumumanResource::getNavigationItems(),
                            ...DonasiResource::getNavigationItems(),
                            ...KegiatanResource::getNavigationItems(),
                            ...TransaksiKeuanganResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('Settings')
                        ->items([
                            ...UserResource::getNavigationItems(),
                            ...RoleResource::getNavigationItems(),
                            ...PermissionResource::getNavigationItems(),
                        ])
                ]);
            });
    }
}
