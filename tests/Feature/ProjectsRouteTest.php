<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProjectsRouteTest extends TestCase
{
    /**
     * Test that the projects route returns a successful response and the correct view.
     */
    public function test_projects_route_returns_successful_response(): void
    {
        $response = $this->get('/projects');

        $response->assertStatus(200);
        $response->assertViewIs('pages.projects');
    }
}
