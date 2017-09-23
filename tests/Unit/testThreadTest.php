<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class testThreadTest extends TestCase
{
    //you have to put this below line

    use DatabaseMigrations;
    protected $thread;

    public function setUp()
    {
      parent::setUp();
      $this->thread = factory('App\Thread')->create();
    }
    function a_thread_has_replies()
    {
      $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    function a_thread_has_a_creator()
    {
      //given that i have a thread
      //when i fetch the threads owner [ $thread->owner ]
      // $thread = factory('App\Thread')->create();
      //owner must be an instance of app/user
      //we are trying to find if threads owner is a part user
      $this->assertInstanceOf('App\User', $this->thread->creator);
    }
    /** @test */
    function a_thread_can_add_a_reply()
    {
      $this->thread->addReply([
        'body' => 'Foobar',
        'user_id' =>1
      ]);
      $this->assertCount(1,$this->thread->replies);
    }

}
