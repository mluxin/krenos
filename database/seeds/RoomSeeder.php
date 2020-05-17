<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            [
                'label' => 'Chine',
            ],

            [
                'label' => 'France',
            ],

            [
                'label' => 'Norvège',
            ],

            [
                'label' => 'Canada',
            ],

            [
                'label' => 'Espagne',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
