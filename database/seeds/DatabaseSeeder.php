<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(TrainingSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(SessionEmployeeSeeder::class);
    }
}
