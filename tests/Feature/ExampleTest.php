<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_givenImNotLoggedIn_whenVistingHomePage_thenIShouldSeeWelcomeMessage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Welcome page');
        $response->assertDontSee('!!!');
    }
}
