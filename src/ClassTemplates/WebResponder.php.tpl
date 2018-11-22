<?php

namespace App\Domain\{sectionName};

use SypherLev\Chassis\Response\WebResponse;

class {sectionName}Responder extends WebResponse
{
    public function index() {
        $this->setTemplate('index.html');
        $this->out();
    }
}