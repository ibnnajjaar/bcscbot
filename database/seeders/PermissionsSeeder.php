<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'ibnahnajjaar@gmail.com')->first();

        $permission = Permission::create(['name' => 'edit users']);
        $user->givePermissionTo('edit users');
    }
}
