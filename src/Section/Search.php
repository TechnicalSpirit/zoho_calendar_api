<?php

namespace Zoho\Api\Calendar\Section;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use Zoho\Api\Calendar\Section\Base\BaseSection;

class Search extends BaseSection
{
    /**
     * This API is used to get the list of events through search.
     *
     * @link https://www.zoho.com/calendar/help/api/get-event-list-through-search.html
     *
     * @param string $caluId
     * @param array $searchParameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEventListThroughSearch(string $caluId, array $searchParameters): ResponseInterface
    {
        return $this->zohoClient->secureRequest(function () use ($caluId,$searchParameters) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$caluId/search?".http_build_query($searchParameters),
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }

    /**
     * This API is used to get a particular event from a calendar through search.
     *
     * @link https://www.zoho.com/calendar/help/api/get-event-through-search.html
     *
     * @param string $caluId
     * @param array $searchParameters
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getEventThroughSearch(string $caluId,
                                          array  $searchParameters): ResponseInterface
    {
        //TODO: куда дивать $searchData в запрос
        return $this->zohoClient->secureRequest(function () use ($caluId, $searchParameters) {
            return $this->zohoClient->client->get(
                "https://calendar.zoho.com/api/v1/calendars/$caluId/search?".http_build_query($searchParameters),
                [
                    "headers" => [
                        'Authorization' => 'Zoho-oauthtoken ' . $this->zohoClient->zohoOAuth->getAccessToken()
                    ],
                ]
            );
        });
    }
}