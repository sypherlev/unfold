<?php

namespace App\Domain\{sectionName};

use SypherLev\Chassis\Action\WebAction;

class {sectionName}Action extends WebAction
{
    /* @var {sectionName}Service */
    private $service;
    /* @var {sectionName}Responder */
    private $responder;

    public function init()
    {
        $this->service = new {sectionName}Service();
        $this->responder = new {sectionName}Responder();
    }
}