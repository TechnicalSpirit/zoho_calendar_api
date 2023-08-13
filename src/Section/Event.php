<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Event extends BaseSection
{
    /**
     * This API is used to get a list of all the events in a particular calendar of the user.
     *
     * @link https://www.zoho.com/calendar/help/api/get-events-list.html
     *
     * @param string $calendarUid
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getAllEvents(string $calendarUid): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to get the event details of a specific event in the user's calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/get-event-details.html
     *
     * @param string $calendarUid
     * @param string $eventUid
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEventDetails(string $calendarUid,
                                    string $eventUid): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $eventUid) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events/$eventUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to create a new event in a user's calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/post-create-event.html
     *
     * @param string $calendarUid
     * @param array $eventData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function createEvent(string $calendarUid,
                                array  $eventData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $eventData) {
            return $this->zohoClient->client->post(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "eventdata" => json_encode($eventData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to update the details of an existing event in a user's calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/put-update-event.html
     *
     * @param string $calendarUid
     * @param string $eventUid
     * @param array $eventData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function updateEvent(string $calendarUid,
                                string $eventUid,
                                array  $eventData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $eventUid, $eventData) {
            return $this->zohoClient->client->post(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events/$eventUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "eventdata" => json_encode($eventData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to delete an event from a user's calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/delete-event.html
     *
     * @param string $calendarUid
     * @param string $eventUid
     * @param string $etag
     * @param array $eventData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function deleteEvent(string $calendarUid,
                                string $eventUid,
                                string $etag,
                                array  $eventData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $eventUid, $etag, $eventData) {
            return $this->zohoClient->client->delete(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events/$eventUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken(),
                        'etag' => $etag
                    ],
                    "form_params" => [
                        "eventdata" => json_encode($eventData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to move event from one calendar to other.
     *
     * @link https://www.zoho.com/calendar/help/api/move-event.html
     *
     * @param string $fromCalendarUid
     * @param string $eventUid
     * @param string $toCalendarUid
     * @param array $eventData
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function moveEvent(string $fromCalendarUid,
                              string $eventUid,
                              string $toCalendarUid,
                              array  $eventData): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($fromCalendarUid, $eventUid, $toCalendarUid, $eventData) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/calendars/$fromCalendarUid/events/$eventUid",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken(),
                        'destinationcaluid'=> $toCalendarUid
                    ],
                    "form_params" => [
                        "eventdata" => json_encode($eventData)
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to get the details of a specific attachment in an event.
     *
     * @link https://www.zoho.com/calendar/help/api/get-attachment-details.html
     *
     * @param string $fileId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEventAttachmentDetails(string $fileId): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($fileId) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/attachment/$fileId",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to get the group attendees details of a specific event in the user's calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/get-group-attendees-details.html
     *
     * @param string $calendarUid
     * @param string $eventUid
     * @param string $groupId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEventGroupAttendeesDetails(string $calendarUid,
                                                  string $eventUid,
                                                  string $groupId): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($calendarUid, $eventUid, $groupId) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$calendarUid/events/$eventUid/groupattendeestatus?groupId=$groupId",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to attach a file to an event in calendar.
     *
     * @link https://www.zoho.com/calendar/help/api/attach-file.html
     *
     * @param string $zclAttachFile
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function attachFile(string $zclAttachFile): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($zclAttachFile) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/attachment",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "zcl_attachFile" => $zclAttachFile
                    ]
                ]
            );
        });
    }

    /**
     * This API is used to delete attachment from an event.
     *
     * @link https://www.zoho.com/calendar/help/api/delete-attachment.html
     *
     * @param string $fileId
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function deleteAttachment(string $fileId): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($fileId) {
            return $this->zohoClient->client->delete(
                "https://calendar.zoho.com/api/v1/attachment/$fileId",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }
}