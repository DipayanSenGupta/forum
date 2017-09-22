<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ExampleTest extends TestCase
{
  use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads');

        $response = $this->get('/threads/' . $thread->id);
        // $response->assertStatus(200);
        $response->assertSee($thread->title);
    }

    public function a_user_can_read_a_single_threads()
    {
        $thread = factory('App\Thread')->create();
        $response = $this->get('/threads/' . $thread->id);
        // $response->assertStatus(200);
        $response->assertSee($thread->title);
    }
}
