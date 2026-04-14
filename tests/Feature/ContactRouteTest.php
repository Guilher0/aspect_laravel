<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactRouteTest extends TestCase
{
    /**
     * Test that the contact route returns a successful response and the correct view.
     */
    public function test_contact_route_returns_successful_response(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertViewIs('pages.contact');
    }
}
