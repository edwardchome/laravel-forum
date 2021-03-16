<?php

namespace Tests\Feature;

use App\Models\Threads;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function a_user_can_browse_threads()
    {
        $thread = Threads::factory()->create();
        $response = $this->get('/threads');

        $response->assertSee($thread->title);
    }
}
