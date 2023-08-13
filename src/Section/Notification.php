<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Notification extends BaseSection
{
    /**
     * This API is used to get the notification details of a particular user.
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getNotificationDetails(): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/notification",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to update the notification details of a particular user.
     *
     * @link https://www.zoho.com/calendar/help/api/put-update-notification-details.html
     *
     * @param array $notification
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function updateNotificationDetails(array $notification): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($notification) {
            return $this->zohoClient->client->put(
                "https://calendar.zoho.com/api/v1/notification",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "notification" => json_encode($notification)
                    ]
                ]
            );
        });
    }
}