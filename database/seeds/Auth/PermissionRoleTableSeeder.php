<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin = Role::create(['name' => config('access.users.admin_role')]);
        $executive = Role::create(['name' => config('access.users.moderator_role')]);
        $user = Role::create(['name' => config('access.users.default_role')]);

        // Create Permissions
        Permission::create(['name' => 'Access Backend']);
        Permission::create(['name' => 'Full access']);

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo('Access Backend');
        $admin->givePermissionTo('Full access');

        // Assign Permissions to other Roles
        $executive->givePermissionTo('Access Backend');

        $this->enableForeignKeys();
    }
}
