<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=['admin','employeed','client'];
        foreach($roles as $role){
            Role::firstOrCreate([
                'name'=>$role,
            ]);
        }
        /*
        Permission::firstOrCreate([
                'name'=>'create_user',
            ]);
        */
    }
}
