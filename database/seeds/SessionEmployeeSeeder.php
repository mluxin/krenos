<?php

use Illuminate\Database\Seeder;
use App\Session;
use App\Employee;
use App\Training;

class SessionEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //SELECT * FROM trainings
        $trainings = Training::all();

        self::linkPhpSessionToEmployee($trainings);
        self::linkManaSessionToEmployee($trainings);
        self::linkUxSessionToEmployee($trainings);
        self::linkJsSessionToEmployee($trainings);
        self::linkDesignSessionToEmployee($trainings);

        $sessions = Session::all();
        foreach($sessions as $session) {
            // update bc sessions are already created by the seeder
            $session->update([
                // count employees for this session and $session->employees return a collection
                'subscription' => $session->employees->count()
            ]);
        };
    }

    private function linkPhpSessionToEmployee($trainings)
    {
        $phpTraining = '';
        $trainings->each(function($training) use(&$phpTraining){
            if(strpos($training->label, 'PHP') !== false) {
                $phpTraining = $training;
            }
        });

        //SELECT first FROM session WHERE training_id = php training id
        $phpSession = Session::query()->where('training_id', '=', $phpTraining->id)->first();

        //SELECT first FROM employees WHERE user_id is different to 6
        $employee = Employee::query()->where('user_id', '!=', 6)->first();

        // employee synchro to session in pivot table
        $employee->sessions()->syncWithoutDetaching($phpSession);
    }

    private function linkManaSessionToEmployee($trainings)
    {
        $manaTraining = '';
        $trainings->each(function($training) use(&$manaTraining){
            if(strpos($training->label, 'Projet') !== false) {
                $manaTraining = $training;
            }
        });

        //SELECT first FROM session WHERE training_id = php training id
        $manaTraining = Session::query()->where('training_id', '=', $manaTraining->id)->first();

        //SELECT first FROM employees WHERE user_id is different to 6
        $employee = Employee::query()->where('user_id', '!=', 6)->first();

        // employee synchro to session in pivot table
        $employee->sessions()->syncWithoutDetaching($manaTraining);
    }

    private function linkUxSessionToEmployee($trainings)
    {
        $uxTraining = '';
        $trainings->each(function($training) use(&$uxTraining){
            if(strpos($training->label, 'UX') !== false) {
                $uxTraining = $training;
            }
        });


        $uxTraining = Session::query()->where('training_id', '=', $uxTraining->id)->first();

        //SELECT first FROM employees WHERE user_id is different to 6
        $employee = Employee::query()->where('user_id', '!=', 6)->first();

        // employee synchro to session in pivot table
        $employee->sessions()->syncWithoutDetaching($uxTraining);
    }

    private function linkJsSessionToEmployee($trainings)
    {
        $jsTraining = '';
        $trainings->each(function($training) use(&$jsTraining){
            if(strpos($training->label, 'JS') !== false) {
                $jsTraining = $training;
            }
        });

        //SELECT first FROM session WHERE training_id = php training id
        $jsTraining = Session::query()->where('training_id', '=', $jsTraining->id)->first();

        //SELECT first FROM employees WHERE user_id is different to 6
        $employee = Employee::query()->where('user_id', '!=', 6)->first();

        // employee synchro to session in pivot table
        $employee->sessions()->syncWithoutDetaching($jsTraining);
    }

    private function linkDesignSessionToEmployee($trainings)
    {
        $designTraining = '';
        $trainings->each(function($training) use(&$designTraining){
            if(strpos($training->label, 'Graphique') !== false) {
                $designTraining = $training;
            }
        });

        //SELECT first FROM session WHERE training_id = php training id
        $designTraining = Session::query()->where('training_id', '=', $designTraining->id)->first();

        //SELECT first FROM employees WHERE user_id is different to 6
        $employee = Employee::query()->where('user_id', '!=', 6)->first();

        // employee synchro to session in pivot table
        $employee->sessions()->syncWithoutDetaching($designTraining);
    }
}
