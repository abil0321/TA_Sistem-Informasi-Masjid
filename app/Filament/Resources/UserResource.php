<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationBadgeTooltip = 'The number of users';

    public static function getNavigationItems(): array
    {
        return Auth::user()?->hasRole('Admin') ? [
            NavigationItem::make()
                ->label('Users')
                ->url(static::getUrl('index'))
                ->icon('heroicon-o-user')
                ->badge(fn() => static::getNavigationBadge())
                ->badgeTooltip(static::$navigationBadgeTooltip)
                ->isActiveWhen(fn() => request()->routeIs([
                    'filament.admin.resources.users.index',
                    'filament.admin.resources.users.create',
                    'filament.admin.resources.users.view',
                    'filament.admin.resources.users.edit',
                ])),
        ] : [];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telp')
                    ->tel()
                    ->label('Nomor Telepon')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->required()
                // Forms\Components\DateTimePicker::make('email_verified_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp')
                    ->label('Nomor Telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name') // Mengambil nama role dari relasi Spatie
                    ->label('Role')
                    ->badge()
                    ->color(fn($record) => match ($record->roles->first()->name ?? null) {
                        'Admin' => 'danger',
                        'Pengurus' => 'warning',
                        default => 'gray',
                    }),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime()
                //     ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
