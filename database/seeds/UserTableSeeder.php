<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'department_name' => 'Head office'
        ]);
        
        DB::table('users')->insert([
            'department_id' => '1',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'status' => '1',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'Administrator'
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage_users',
            'label' => 'Manage user accounts'
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1'
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => '1',
            'role_id' => '1',
        ]);
    }
}
