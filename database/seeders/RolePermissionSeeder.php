<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage artikel',
            'manage kursus',
            'manage modul',
            'manage pelajaran',
            'manage user',
            'apply kursus',
        ];

        foreach ($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $mentorRole = Role::firstOrCreate([
            'name' => 'mentor'
        ]);

        $mentorPermission = [
            'manage kursus',
            'manage modul',
            'manage pelajaran',
            'manage artikel',
        ];

        $mentorRole->syncPermissions($mentorPermission);

        $siswaRole = Role::firstOrCreate([
            'name' => 'siswa'
        ]);

        $siswaPermission = [
            'apply kursus'
        ];

        $siswaRole->syncPermissions($siswaPermission);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'superadmin'
        ]);

        $superAdminPermission = [
            'manage artikel',
            'manage kursus',
            'manage modul',
            'manage pelajaran',
            'manage user',
            'apply kursus',
        ];

        $superAdminRole->syncPermissions($superAdminPermission);

        $user = User::create([
            'nama' => 'admin',
            'email' => 'team@courseapp.com',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('superadmin123'),
        ]);
        $user->assignRole($superAdminRole);

    }
}
