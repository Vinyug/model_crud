<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('0123456789')
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id');
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        // Attach permissions to user
        $userPermissions = Permission::all();
        foreach ($userPermissions as $permission) {
            $user->givePermissionTo($permission);
        }
    }
}
