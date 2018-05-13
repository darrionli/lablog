<?php

use Illuminate\Database\Seeder;

class LabelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->delete();
        DB::table('labels')->insert([
            [
                'id' => 1,
                'name' => 'laravel',
                'created_at' => '2018-2-16 07:35:12',
                'updated_at' => '2018-2-16 07:35:12',
                'deleted_at' => NULL,
            ],
            [
                'id' => 2,
                'name' => '框架',
                'created_at' => '2018-2-16 07:35:12',
                'updated_at' => '2018-2-16 07:35:12',
                'deleted_at' => NULL,
            ],
            [
                'id' => 3,
                'name' => 'PHP',
                'created_at' => '2018-2-16 07:35:12',
                'updated_at' => '2018-2-16 07:35:12',
                'deleted_at' => NULL,
            ],
        ]);
    }
}
