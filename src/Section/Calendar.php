<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Calendar extends BaseSection
{
    /**
     * This API is used to get the list of all calendars or list of calendars based on a specific category/entity of a given user.
     *
     * @link https://www.zoho.com/calendar/help/api/get-calendar-list.html
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getAllCalendar(): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ]
                ]
            );
        });
    }

    /**
     * This API retrieves the details of a particular calendar using the Calendar UID.
     *
     * @link https://www.zoho.com/calendar/help/api/get-calendar-details.html
     *
     * @param string $calendarUid
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getCalendarDetails(string $calendarUid): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ]
                ]
            );
        });
    }

    /**
     * This API helps in creating a new calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/post-create-calendar.html
     *
     * @param array $calendarData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function createCalendar(array $calendarData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarData) {
            return $this->zohoClient->client->post(
                "https://calendar.zoho.com/api/v1/calendars",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "calendarData" => json_encode($calendarData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to update an existing calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/put-update-calendar.html
     *
     * @param string $calendarUid
     * @param array $calendarData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function updateCalendar(string $calendarUid,
                                   array $calendarData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $calendarData) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "calendarData" => json_encode($calendarData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to delete a calendar using the calendar identifier.
     *
     * @link https://www.zoho.com/calendar/help/api/delete-calendar.html
     *
     * @param string $calendarUid
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function deleteCalendar(string $calendarUid): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid) {
            return $this->zohoClient->client->delete(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }
}