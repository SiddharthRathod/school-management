<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create Roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $parentRole = Role::firstOrCreate(['name' => 'parent']);

        // Add Admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mailinator.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
        ]);
        $admin->assignRole($adminRole);

        // Add Teacher
        $teacher = User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@mailinator.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
        ]);
        $teacher->assignRole($teacherRole);

        // Add Student
        $student = User::factory()->create([
            'name' => 'Student',
            'email' => 'student@mailinator.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
        ]);
        $student->assignRole($studentRole);

        // Add Parent
        $parent = User::factory()->create([
            'name' => 'Parent',
            'email' => 'parent@mailinator.com',
            'password' => Hash::make('123456789'),
            'status' => 'active',
        ]);
        $parent->assignRole($parentRole);
        
        
    }
}
