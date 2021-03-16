<?php

namespace Tests\Unit;

use App\Models\Threads;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function a_thread_has_replies()
    {
        $thread = Threads::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$thread->replies);
    }

    /**
     * @test
     */
    public function a_thread_has_a_creator(){
        $thread = Threads::factory()->create();

        $this->assertInstanceOf('App\Models\User',$thread->creator);
    }
}
