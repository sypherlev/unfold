<?php

namespace App\Domain\{sectionName};

use App\Common\BasicService;
use App\DBAL\UserData;
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
        $this->usersource = $this->objectCollection->get(UserData::class);
        $this->logger = new Logger();
    }
}