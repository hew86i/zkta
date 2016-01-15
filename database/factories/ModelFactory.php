<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    $privs = [0, 2, 6, 14];
    $date = $faker->dateTimeThisMonth($max = 'now');
    return [
        'pin' => $faker->unique()->numberBetween($min = 1, $max = 200),
        'name' => $faker->firstName,
        'password' => $faker->randomNumber($nbDigits = 4),
        'group' => $faker->optional($weight = 0.1, $default = 1)->randomDigit,
        'privilege' => $privs[array_rand($privs)],
        'card_number' => $faker->ean8,
        'pin2' => 0,
        'tz1' => 0,
        'tz2' => 0,
        'tz3' => 0,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

$factory->define(App\Device::class, function (Faker\Generator $faker) {
    $arr_encoding = ['UTF-8', 'ISO-8859-13', 'UTF-16', 'ISO-2022-CN'];
    return [
        'device_name' => $faker->words($nb = 2, $asText = true),
        'internal_id' => 1,
        'ip_address' => $faker->localIpv4,
        'com_key' => 0,
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'soap_port' => $faker->unique()->numberBetween($min = 64, $max = 1023),
        'udp_port' => $faker->unique()->numberBetween($min = 1024, $max = 9999),
        'encoding' => $arr_encoding[array_rand($arr_encoding)],
        'connection_timeout' => intval($faker->biasedNumberBetween($min = 1, $max = 10, $function = 'Faker\Provider\Biased::linearLow')),
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    $arr_status = [0, 1, 2, 3];
    $arr_workcode = [1, 2, 3, 4, 5, 6, 10, 11];
    $arr_device_id = [1, 2, 3];
    $arr_emp_id = range(1, 20);
    return [
        'emp_id' => $faker->numberBetween($min = 1, $max = 20),
        'device_id' => $arr_device_id[array_rand($arr_device_id)],
        'datetime' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'verified' => 0,
        'status' => $arr_status[array_rand($arr_status)],
        'workcode' => $arr_workcode[array_rand($arr_workcode)],
    ];
});
