<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role_id = Role::firstOrCreate(['name' => 'owner'])->id;

        $user = User::where('email', 'admin@admin.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'badr',
                'phone_number' => '945496372',
                'email' => 'admin@admin.com',
                'role_id' => $role_id,
                'gender' => 'male',
                'password' => 'badr12345',
                'date_of_birth' => '2001-01-01'
            ]);
        }

        $package = Package::create([
            'name_ar' => 'افتراضي',
            'name_en' => 'default',
            'price' => 1000,
            'patiant_count' => 10
        ]);

        $user->packages()->syncWithPivotValues(
            [$package->id],
            [
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-03',
                'status' => 'active',
                'renew' => false,
            ]
        );
    }
}
