<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TYDSSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tyds_subjects')->insert([
           'subject' => 'A',
           'count' => '10',
           'level' =>0
        ]);
        DB::table('tyds_subjects')->insert([
           'subject' => 'B',
           'count' => '10',
           'level' =>0
        ]);
        DB::table('tyds_subjects')->insert([
           'subject' => 'C',
           'count' => '10',
           'level' =>1
        ]);
        DB::table('tyds_subjects')->insert([
           'subject' => 'D',
           'count' => '10',
           'level' =>1
        ]);
        DB::table('tyds_subjects')->insert([
           'subject' => 'E',
           'count' => '10',
           'level' =>1
        ]);
    }
}
