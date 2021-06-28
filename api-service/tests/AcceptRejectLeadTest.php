<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AcceptRejectLeadTest extends TestCase
{
    /**
     * This job will test the lead update.
     *
     * @return void
     */
    /**
     * /jobs [PUT]
     */
    public function testShouldRejectLead(){

        $parameters = [
            'id' => 1,
            'status' => 'declined',
        ];

        $this->put("api/v1/job", $parameters);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'success',
            'message',
            'status_code'
        ]);
    }
}
