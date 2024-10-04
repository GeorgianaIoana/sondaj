<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AppointmentSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
