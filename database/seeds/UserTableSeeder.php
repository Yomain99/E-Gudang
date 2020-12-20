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
        $owner->name = 'Tedy';
        $owner->email = 'tedy@gmail.com';
        $owner->company_name = 'Owner';
        $owner->user_address = 'Jl hos cokroaminoto';
        $owner->phone = '081231718801';
        $owner->id_role = '2';
        $owner->password = bcrypt('owner');
        $owner->save();

        $masyarakat = new User();
        $masyarakat->name = 'pemri';
        $masyarakat->email = 'pemri@gmail.com';
        $masyarakat->user_address = 'Jl hos cokroaminoto';
        $masyarakat->phone = '081232332323';
        $masyarakat->id_role = '3';
        $masyarakat->password = bcrypt('masyarakat');
        $masyarakat->save();
    }
}
