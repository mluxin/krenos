<?php

use Illuminate\Database\Seeder;
use App\Teacher;
use App\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SELECT * FROM teachers
        $teacherIds = Teacher::all()->pluck('id');

        $trainings = [
            [
                'label' => 'Développement PHP',
                'teacher_id' => $teacherIds[0],
            ],

            [
                'label' => 'Gestion de Projet',
                'teacher_id' => $teacherIds[0],
            ],

            [
                'label' => 'Méthodes UX/UI',
                'teacher_id' => $teacherIds[1],
            ],

            [
                'label' => 'Développement JS',
                'teacher_id' => $teacherIds[1],
            ],

            [
                'label' => 'Conception Graphique',
                'teacher_id' => $teacherIds[1],
            ],
        ];

        foreach ($trainings as $training) {
            Training::create($training);
        }
    }
}
