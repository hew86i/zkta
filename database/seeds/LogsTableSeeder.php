<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_emp = App\Employee::all();
        $dev_number = App\Device::all()->count();
        $dev_list = range(1, $dev_number);
        $emp_list = range(1, $all_emp->count());

        for ($i = 0; $i < 200; $i++) {
            $log = factory(App\Log::class)->make();
            $log->emp_id = $emp_list[array_rand($emp_list)];
            $log->device_id = App\Employee::find($log->emp_id)->devices()->first()->pivot->device_id;

            $log->save();
        }
    }
}
