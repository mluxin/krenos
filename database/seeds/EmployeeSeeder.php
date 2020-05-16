<?php

use Illuminate\Database\Seeder;

use App\Employee;
use App\User;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //SELECT * FROM users WHERE role=User::EMPLOYEE
         $employeeUserIds = User::query()->where('role', '=', User::EMPLOYEE)->pluck('id'); //pluck() = extract value from teacher table

         // INSERT INTO employees (user_id)
         foreach ($employeeUserIds as $employeeUserId) {
             Employee::create([
                 'user_id' => $employeeUserId,
                 ]);
         }
    }
}
