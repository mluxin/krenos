<?php

use Illuminate\Database\Seeder;
use App\Teacher;
use App\Training;
use App\Room;
use App\Session;


class SessionSeeder extends Seeder
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
        //SELECT * FROM trainings
        $trainings = Training::all();
         //SELECT * FROM rooms
        $roomIds = Room::all()->pluck('id');

        // POO --> precise the class SessionSeeder (the class call itself)
        self::createPhpSession($teacherIds, $trainings, $roomIds);
        self::createManagementSession($teacherIds, $trainings, $roomIds);
        self::createUxSession($teacherIds, $trainings, $roomIds);
        self::createJsSession($teacherIds, $trainings, $roomIds);
        self::createDesignSession($teacherIds, $trainings, $roomIds);

    }

    private function createPhpSession($teachers, $trainings, $rooms)
    {
        // trainings is a collection (like an array)
        // each() is a foreach with a callback function for a collection
        $phpTraining = '';
        $trainings->each(function($training) use(&$phpTraining){     //use without a variable copy (&)
            if(strpos($training->label, 'PHP') !== false) {          // if there is PHP in collection's label string
                $phpTraining = $training;
            }
        });

        $phpSessions = [
            [
                'teacher_id' => $teachers[0],
                'training_id' => $phpTraining->id,
                'room_id' => $rooms[0],
                'label' => 'Laravel',
                'training_day' => '2020-09-01',
            ],
            [
                'teacher_id' => $teachers[1],
                'training_id' => $phpTraining->id,
                'room_id' => $rooms[1],
                'label' => 'Symphonie',
                'training_day' => '2020-09-02',
            ],
        ];

        foreach ($phpSessions as $phpSession) {
            Session::create($phpSession);
        }
    }

    private function createManagementSession($teachers, $trainings, $rooms)
    {
        $manaTraining = '';
        $trainings->each(function($training) use(&$manaTraining){
            if(strpos($training->label, 'Projet') !== false) {
                $manaTraining = $training;
            }
        });

        $managementSessions = [
            [
                'teacher_id' => $teachers[1],
                'training_id' => $manaTraining->id,
                'room_id' => $rooms[4],
                'label' => 'Gestion du personnel',
                'training_day' => '2020-10-01',
            ],
            [
                'teacher_id' => $teachers[0],
                'training_id' => $manaTraining->id,
                'room_id' => $rooms[2],
                'label' => 'Stratégies',
                'training_day' => '2020-10-09',
            ],
        ];

        foreach ($managementSessions as $managementSession) {
            Session::create($managementSession);
        }
    }

    private function createUxSession($teachers, $trainings, $rooms)
    {
        $uxTraining = '';
        $trainings->each(function($training) use(&$uxTraining){
            if(strpos($training->label, 'UX') !== false) {
                $uxTraining = $training;
            }
        });

        $uxSessions = [
            [
                'teacher_id' => $teachers[1],
                'training_id' => $uxTraining->id,
                'room_id' => $rooms[3],
                'label' => 'User Journey',
                'training_day' => '2020-10-015',
            ],
            [
                'teacher_id' => $teachers[0],
                'training_id' => $uxTraining->id,
                'room_id' => $rooms[0],
                'label' => 'Story Telling',
                'training_day' => '2020-10-22',
            ],
        ];

        foreach ($uxSessions as $uxSession) {
            Session::create($uxSession);
        }
    }

    private function createJsSession($teachers, $trainings, $rooms)
    {
        $jsTraining = '';
        $trainings->each(function($training) use(&$jsTraining){
            if(strpos($training->label, 'JS') !== false) {
                $jsTraining = $training;
            }
        });

        $jsSessions = [
            [
                'teacher_id' => $teachers[1],
                'training_id' => $jsTraining->id,
                'room_id' => $rooms[1],
                'label' => 'Asynch',
                'training_day' => '2020-11-03',
            ],
            [
                'teacher_id' => $teachers[0],
                'training_id' => $jsTraining->id,
                'room_id' => $rooms[0],
                'label' => 'Node.js',
                'training_day' => '2020-11-16',
            ],
        ];

        foreach ($jsSessions as $jsSession) {
            Session::create($jsSession);
        }
    }

    private function createDesignSession($teachers, $trainings, $rooms)
    {
        $designTraining = '';
        $trainings->each(function($training) use(&$designTraining){
            if(strpos($training->label, 'Graphique') !== false) {
                $designTraining = $training;
            }
        });

        $designSessions = [
            [
                'teacher_id' => $teachers[1],
                'training_id' => $designTraining->id,
                'room_id' => $rooms[3],
                'label' => 'Wireframe',
                'training_day' => '2020-11-10',
            ],
            [
                'teacher_id' => $teachers[0],
                'training_id' => $designTraining->id,
                'room_id' => $rooms[0],
                'label' => 'Intégration',
                'training_day' => '2020-12-06',
            ],
        ];

        foreach ($designSessions as $designSession) {
            Session::create($designSession);
        }
    }
}
