<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(DevicesTableSeeder::class);

        $this->call(EmployeesDevicesTableSeeder::class);

        $this->call(LogsTableSeeder::class);

        Model::reguard();
    }
}
