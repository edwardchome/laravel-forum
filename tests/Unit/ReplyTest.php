<?php

namespace Tests\Unit;

use App\Models\Replies;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_has_an_owner()
    {
        $reply = Replies::factory()->create();
        $this->assertInstanceOf('App\Models\User',$reply->owner);
//        $this->assertTrue(true);
    }
}
