<?php

namespace Zoho\Api\Calendar\Section\Base;

use Zoho\Api\Calendar\ZohoCalendarAPI;

class BaseSection
{
    /**
     * @var ZohoCalendarAPI
     */
    protected $zohoClient;

    public function __construct(ZohoCalendarAPI $zohoClient)
    {
        $this->zohoClient = $zohoClient;
    }
}