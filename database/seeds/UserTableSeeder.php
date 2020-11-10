<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->user_address = 'Jl Kenangan 12 Jember';
        $admin->phone = '087709307745';
        $admin->id_role = '1';
        $admin->save();

        $owner = new User();
        $owner->name = 'Owner';
        $owner->email = 'owner@gmail.com';
        $owner->company_name = 'Owner Corp.';
        $owner->user_address = 'Jl Kenangan mantan 13 Jember';
        $owner->phone = '089876987954';
        $owner->id_role = '2';
        $owner->password = bcrypt('owner');
        $owner->save();

        $Petani = new User();
        $Petani->name = 'Petani';
        $Petani->email = 'Petani@gmail.com';
        $Petani->user_address = 'Jl Kenangan 12 Jember';
        $Petani->phone = '081235367890';
        $Petani->id_role = '3';
        $Petani->password = bcrypt('Petani');
        $Petani->save();
    }
}
