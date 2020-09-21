<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\UserSubmission;

class UserSubmissionIndexTest extends TestCase
{
    /**
     * Test endpoint.
     *
     * @return void
     */
    public function test_endpoint_exists()
    {

        $response = $this->get('api/user-submissions/');

        $response->assertStatus(200);
    }
}
