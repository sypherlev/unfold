<?php

namespace App\Domain\{sectionName};

use SypherLev\Chassis\Action\CliAction;

class {sectionName}Action extends CliAction
{
    /* @var {sectionName}Service */
    private $service;

    public function init() {
        $this->service = new {sectionName}Service();
    }
}