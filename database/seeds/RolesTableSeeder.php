<?php


use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['role_name' => 'admin']);
        Role::create(['role_name' => 'owner']);
        Role::create(['role_name' => 'masyarakat']);
    }
}
