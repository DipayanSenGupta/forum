<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class testThreadTest extends TestCase
{
  use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
      parent::SetUp();
      $this->thread = factory('App\Thread')->create();
    }
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads');

        // $response = $this->get('/threads/' . $thread->id);
        $response->assertStatus(200);
        $response->assertSee($this->$thread->title);
    }

    public function a_user_can_read_a_single_threads()
    {
        $response = $this->get($this->$thread->path());
        // $response->assertStatus(200);
        $response->assertSee($this->$thread->title);
    }
    //
    function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
      //Given we have a thread
      //And that the thread includes replies
      //when we visit a thread page
      //then we should see the replies
      $reply = factory('App\Reply')
      ->create(['thread_id' => $this->thread->id]);

      $this->get($this->$thread->path())
            ->assertSee($reply->body);

    }
  }
