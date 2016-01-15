<?php

use App\Device;
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_emp = Employee::all();
        $dev_number = Device::all()->count();
        $dev_list = range(1, $dev_number);
        foreach ($all_emp as $employee) {
            $employee->devices()->attach($dev_list[array_rand($dev_list)]);
        }
    }
}
