<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            'role_name'        => 'administrator',
            'role_description' => 'user administrator',
            'created_at'       => Carbon::now()
        ]);
    }
}
