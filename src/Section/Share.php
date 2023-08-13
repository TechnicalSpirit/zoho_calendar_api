<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Share extends BaseSection
{
    /**
     * This API is used to get the calendar details of a calendar that has been shared with another user.
     *
     * @link https://www.zoho.com/calendar/help/api/get-shared-calendar-details.html
     *
     * @param string $calendarId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getSharedCalendarDetails(string $calendarId): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarId) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$calendarId/share",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to update the calendar that is shared with another user.
     *
     * @link https://www.zoho.com/calendar/help/api/put-share-calendar.html
     *
     * @return void
     * @throws GuzzleException
     */
    public function shareCalendar(string $calendarId, array $shareData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarId, $shareData) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/calendars/$calendarId/share",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "shareData" => json_encode($shareData)
                    ]
                ]
            );
        });
    }
}