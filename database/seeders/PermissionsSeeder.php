<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        ###### OBJECTION ######
        Permission::create(['name' => 'objection_audit']);

        ###### News ######
        Permission::create(['name' => 'edit news']);
        Permission::create(['name' => 'delete add']);
        Permission::create(['name' => 'create news']);

        ###### advisors  ######
        Permission::create(['name' => 'transfer advisor']);
        Permission::create(['name' => 'delete advisor']);

        ###### supervisors  ######
        Permission::create(['name' => 'transfer supervisor']);
        Permission::create(['name' => 'delete supervisor']);

         ###### leaders  ######
         Permission::create(['name' => 'transfer leader']);
         Permission::create(['name' => 'delete leader']);


        // create roles and assign existing permissions

        $role1 = Role::create(['name' => 'admin']);
        $role4 = Role::create(['name' => 'consultant']);
        $role2 = Role::create(['name' => 'advisor']);
        $role3 = Role::create(['name' => 'supervisor']);

        $role1->givePermissionTo(Permission::all());
        $role4->givePermissionTo(Permission::all());
        
        $role2->givePermissionTo('objection_audit');
        $role2->givePermissionTo('transfer supervisor');
        $role2->givePermissionTo('delete supervisor');
        $role2->givePermissionTo('transfer leader');
        $role2->givePermissionTo('delete leader');

    }
}
