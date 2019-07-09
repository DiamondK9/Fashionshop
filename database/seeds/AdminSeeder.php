<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\Admin;
        $admin->admin_username = "admin";
        $admin->admin_email = "admin@gmail.com";
        $admin->admin_password = bcrypt(123456);
        $admin->admin_name = "admin";
        $admin->active = 1;
        $admin->save();
    }
}
