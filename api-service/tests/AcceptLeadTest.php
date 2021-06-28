<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AcceptLeadTest extends TestCase
{
    /**
     * This job will test the lead update.
     *
     * @return void
     */
    /**
     * /jobs [PUT]
     */
    public function testShouldAcceptLead(){

        $parameters = [
            'id' => 1,
            'status' => 'accepted',
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
