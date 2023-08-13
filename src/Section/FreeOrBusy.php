<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class FreeOrBusy extends BaseSection
{
    /**
     * This API is used to get the free/busy details of the user from all the calendars.
     *
     * @link https://www.zoho.com/calendar/help/api/get-user-freebusy-details.html
     *
     * @param array $searchParameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getUserFreeOrBusyDetails(array $searchParameters): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($searchParameters){
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/freebusy?".http_build_query($searchParameters),
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }
}