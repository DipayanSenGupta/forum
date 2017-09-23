<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;
    /** test */
    function unauthenticated_users_may_not_add_replies()
    {
      $this->expectException();
      $thread = factory('App\Thread')->create();
      //When the user adds a reply to the thread
      $reply = factory('App\Reply')->create();
      $this->post($thread->path().'/replies', $reply->toArray());
    }
    /** test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
        //Given we have a authenticated User
       $this->be($user = factory('App\User')->create());
        //And an, existing Thread
        $thread = factory('App\Thread')->create();
        //When the user adds a reply to the thread
        $reply = factory('App\Reply')->make();
        $this->post($thread->path().'/replies', $reply->toArray());
        //then their reply should be visible on the page
        //(casting reply to an array)

        $this->get($thread->path())
              ->assertSee($reply->body);
    }
}
