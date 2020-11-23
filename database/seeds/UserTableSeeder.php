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
        $admin->email = 'yosha@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->user_address = 'Jl besuki no 22 nganjuk';
        $admin->phone = '081231718801';
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

        $masyarakat = new User();
        $masyarakat->name = 'masyarakat';
        $masyarakat->email = 'masyarakat@gmail.com';
        $masyarakat->user_address = 'Jl Kenangan 12 Jember';
        $masyarakat->phone = '081235367890';
        $masyarakat->id_role = '3';
        $masyarakat->password = bcrypt('masyarakat');
        $masyarakat->save();
    }
}
