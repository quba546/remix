<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            DB::table('timetable')->insert(
                [
                    'round' => $i + 1,
                    'date' => '29-31 października',
                    'details' => "Orzeł Bażanówka\t3-0\tVictoria Pakoszówka\t15 sierpnia, 18:00\r\n
(wo)\r\n
na boisku 0-2\r\n
Sanovia Lesko\t10-0\tSzarotka Nowosielce\t15 sierpnia, 16:30\r\n
LKS Długie\t3-1\tLKS Płowce/Stróże Małe\t16 sierpnia, 17:00\r\n
Górnik Strachocina\t4-0\tLotniarz Bezmiechowa\t16 sierpnia, 15:00\r\n
Zgoda Zarszyn\t3-0\tRemix Niebieszczany\t16 sierpnia, 17:00\r\n
Bukowianka Bukowsko\t6-1\tBieszczady Jankowce\t16 sierpnia, 15:00\r\n
Osława Zagórz\t5-1\tWiki Sanok\t16 sierpnia, 14:00"
                ]
            );
        }
    }
}
