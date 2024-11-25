<?php

namespace Database\Seeders;

use App\Models\User;
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
      
        $permissions = [
            'manage artikel',
            'manage kursus',
            'manage modul',
            'manage pelajaran',
            'manage user',
            'apply kursus',
        ];

      
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

       
        $mentorRole = Role::firstOrCreate(['name' => 'mentor']);
        $mentorPermission = [
            'manage kursus',
            'manage modul',
            'manage pelajaran',
            'manage artikel',
        ];
        $mentorRole->syncPermissions($mentorPermission);

      
        $siswaRole = Role::firstOrCreate(['name' => 'siswa']);
        $siswaPermission = ['apply kursus'];
        $siswaRole->syncPermissions($siswaPermission);

       
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $superAdminRole->syncPermissions($permissions);

     
        $superAdmin = User::firstOrCreate([
            'email' => 'admin@courseapp.com',
        ], [
            'nama' => 'Super Admin',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('superadmin123'),
        ]);
        $superAdmin->assignRole($superAdminRole);

       
        $mentor = User::firstOrCreate([
            'email' => 'mentor@courseapp.com',
        ], [
            'nama' => 'Mentor',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('mentor123'),
        ]);
        $mentor->assignRole($mentorRole);

      
        $siswa = User::firstOrCreate([
            'email' => 'siswa@courseapp.com',
        ], [
            'nama' => 'Siswa User',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('siswa123'),
        ]);
        $siswa->assignRole($siswaRole);
    }
}
