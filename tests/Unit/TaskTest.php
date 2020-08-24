<?php

namespace Tests\Unit;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * Get Seeder Tasks Test
     *
     * @return void
     */
    public function testGetSeederTasks()
    {
        //　全件取得
        $tasks = Task::all();
        $this->assertEquals(3, count($tasks));

        //タスクが完了していないモノを取得
        $taskNotFinished = Task::where('executed', false)->get();
        $this->assertEquals(2, count($taskNotFinished));

        //タスクが完了しているモノを取得
        $taskFinished = Task::where('executed', true)->get();
        $this->assertEquals(1, count($taskFinished));

        //「テストタスク」というタイトルを取得
        $task1 = Task::where('title', 'テストタスク')->first();
        $this->assertFalse(boolval($task1->executed));

        // 「終了タスク」というタイトルを取得
        $task2 = Task::where('title', '終了タスク')->first();
        $this->assertTrue(boolval($task2->executed));
    }
}
