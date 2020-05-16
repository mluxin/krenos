<?php

use Illuminate\Database\Seeder;
use App\Teacher;
use App\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SELECT * FROM users WHERE role=User::TEACHER
        $teacherUserIds = User::query()->where('role', '=', User::TEACHER)->pluck('id'); //pluck() = extract value from teacher table

        // INSERT INTO teachers (user_id)
        foreach ($teacherUserIds as $teacherUserId) {
            Teacher::create([
                'user_id' => $teacherUserId,
                ]);
        }
    }
}
