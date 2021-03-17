<?php

namespace Tests\Unit;

use App\Models\Threads;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->thread = Threads::factory()->create();
    }

    /**
     * @test
     */
    public function a_thread_has_replies()
    {
//        $thread = Threads::factory()->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection',$this->thread->replies);
    }

    /**
     * @test
     */
    public function a_thread_has_a_creator(){
        $thread = Threads::factory()->create();

        $this->assertInstanceOf('App\Models\User',$this->thread->creator);
    }

    /**
     * @test
     */
    public function a_thread_has_can_add_a_reply(){
//        $this->assertInstanceOf("App\Models\User",$this->thread->creator);
        $this->thread->addReply([
         'body'=>'Foobar',
            'user_id'=>1
        ]);

        $this->assertCount(1,$this->thread->replies);
    }

    /**
     * @test
     */
    public function a_thread_belongs_to_a_channel(){
        $thread = Threads::factory()->create();
        $this->assertInstanceOf("App\Models\Channel",$thread->channel);
    }
}
