<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // 'edit-settings',
            // 'view-transactions',

            // User management
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // Role management
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',

            // Donation management
            'donasi.view',
            'donasi.create',
            'donasi.edit',
            'donasi.delete',

            // Activities management
            'kegiatan.view',
            'kegiatan.create',
            'kegiatan.edit',
            'kegiatan.delete',

            // Announcements management
            'pengumuman.view',
            'pengumuman.create',
            'pengumuman.edit',
            'pengumuman.delete',

            // Transaction management
            'transaksi.view',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions (Removed jemaah role)
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        $pengurusRole = Role::create(['name' => 'Pengurus']);
        $pengurusRole->givePermissionTo([
            'donasi.view', 'donasi.create', 'donasi.edit', 'donasi.delete',
            'kegiatan.view', 'kegiatan.create', 'kegiatan.edit', 'kegiatan.delete',
            'pengumuman.view', 'pengumuman.create', 'pengumuman.edit', 'pengumuman.delete',
            'transaksi.view'
        ]);

        // Create admin user
        $user = User::factory()->create([
            'name' => 'Admin1',
            'email' => 'admin@masjid.com',
            'password' => 'admin123',
        ]);
        $user->assignRole('Admin');

        // Create pengurus user
        $pengurus = User::factory()->create([
            'name' => 'Pengurus1',
            'email' => 'pengurus@masjid.com',
            'password' => 'pengurus123',
        ]);
        $pengurus->assignRole('Pengurus');
    }
}
