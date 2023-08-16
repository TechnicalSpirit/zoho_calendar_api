<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Group extends BaseSection
{
    /**
     * To get the list of all group calendars.
     *
     * @link https://www.zoho.com/calendar/help/api/get-group-calendar-list.html
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getGroupCalendarList(): ResponseInterface
    {
        return $this->zohoClient->client->get(
            "https://calendar.zoho.com/api/v1/groups",
            [
                "headers" => [
                    'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                ],
            ]
        );
    }
}