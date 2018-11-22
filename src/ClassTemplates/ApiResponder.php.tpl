<?php

namespace App\Domain\{sectionName};

use SypherLev\Chassis\Response\ApiResponse;

class {sectionName}Responder extends ApiResponse
{
    public function __construct()
    {
        $this->setHTTPCode(500);
        $this->setOutputMessage('Unrecognized API call');
    }

    public function successfulRequest() {
        $this->setHTTPCode(200);
        $this->setOutputMessage('success');
        $this->out();
    }

    public function unsuccessfulRequest() {
        $this->setHTTPCode(200);
        $this->setOutputMessage('failure');
        $this->out();
    }
}