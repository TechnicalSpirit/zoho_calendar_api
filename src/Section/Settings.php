<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Settings extends BaseSection
{
    /**
     * This API is used to get the calendar settings of the user.
     *
     * @link https://www.zoho.com/calendar/help/api/get-calendar-settings.html
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getCalendarSettings(): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/settings",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to update the calendar settings of the user.
     *
     * @link https://www.zoho.com/calendar/help/api/put-update-calendar-settings.html
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function updateCalendarSettings(array $settingsData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($settingsData) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/settings",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "settingsdata" => json_encode($settingsData)
                    ]
                ]
            );
        });
    }
}