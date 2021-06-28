<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LeadListingTest extends TestCase
{
    /**
     * Get jobs test.
     *
     * @return void
     */
    /**
     * /jobs [GET]
     */
    public function testShouldReturnAllLeadJobs(){

        $this->get("api/v1/job", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'contact_name',
                    'contact_phone',
                    'contact_email',
                    'lead_price',
                    'status',
                    'location_name',
                    'date',
                    'created_at',
                ]
            ],
            'to',
            'total',
            'per_page',
            'current_page',
            'prev_page_url',
            'next_page_url',
        ]);
    }
}
