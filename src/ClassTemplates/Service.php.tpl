<?php

namespace App\Domain\{sectionName};

use App\Common\BasicService;
use SypherLev\Chassis\Logger;

class {sectionName}Service extends BasicService
{
    /* @var UserData */
    private $usersource;
    /* @var Logger */
    private $logger;

    public function __construct()
    {
        parent::__construct();
        $this->usersource = $this->objectCollection->get('user-local');
        $this->logger = new Logger();
    }
}