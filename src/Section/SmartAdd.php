<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class SmartAdd extends BaseSection
{
    /**
     * This API is used to create a new event in a particular calendar using Smart Add.
     *
     * @link https://www.zoho.com/calendar/help/api/post-create-event-smart-add.html
     *
     * @param string $title
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function createEventUsingSmartAdd(string $saddtext): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($saddtext) {
            return $this->zohoClient->client->post(
                "https://calendar.zoho.com/api/v1/smartadd",
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                    "form_params" => [
                        "saddtext" => $saddtext
                    ]
                ]
            );
        });
    }
}