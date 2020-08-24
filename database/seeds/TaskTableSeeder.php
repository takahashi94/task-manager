<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' =>Str::random(512),
            'executed' => false,
        ]);

        DB::table('tasks')->insert([
            'title' => "テストタスク",
            'executed' => false,
        ]);

        DB::table('tasks')->insert([
            'title' => '終了タスク',
            'executed' => true,
        ]);
    }
}
