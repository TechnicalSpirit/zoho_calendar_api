<?php

namespace Zoho\Api\Calendar;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Zoho\Api\Calendar\OAuth\ZohoOAuth;
use Zoho\Api\Calendar\Section\Calendar;
use Zoho\Api\Calendar\Section\Event;
use Zoho\Api\Calendar\Section\FreeOrBusy;
use Zoho\Api\Calendar\Section\Group;
use Zoho\Api\Calendar\Section\Notification;
use Zoho\Api\Calendar\Section\Search;
use Zoho\Api\Calendar\Section\Settings;
use Zoho\Api\Calendar\Section\Share;
use Zoho\Api\Calendar\Section\SmartAdd;


class ZohoCalendarAPI
{
    /**
     * @var Client
     */
    public $client;

    /**
     * @var ZohoOAuth
     */
    public $zohoOAuth;

    /**
     * @param string $domain
     * @param string $accessToken
     * @param string $refreshToken
     * @param string $clientId
     * @param string $clientSecret
     */
    public function __construct(string $domain,
                                string $accessToken,
                                string $refreshToken,
                                string $clientId,
                                string $clientSecret)
    {
        $this->client = new Client();
        $this->zohoOAuth = new ZohoOAuth($this->client,
            $domain,
            $accessToken,
            $refreshToken,
            $clientId,
            $clientSecret);
    }

    /**
     * @throws GuzzleException
     */
    public function secureRequest(callable $requestMethod)
    {
        try
        {
            $response = $requestMethod();
        }
        catch (ClientException $clientException)
        {
            $result = $this->zohoOAuth
                ->getRefreshToken()
                ->getBody()
                ->getContents();
            $result = json_decode($result, true);

            $this->zohoOAuth->setAccessToken($result["access_token"]);
            return $requestMethod();
        }
        return $response;
    }

    /**
     * @return Group
     */
    public function group(): Group
    {
        return new Group($this);
    }

    /**
     * @return Calendar
     */
    public function calendar(): Calendar
    {
        return new Calendar($this);
    }

    /**
     * @return Share
     */
    public function share(): Share
    {
        return new Share($this);
    }

    /**
     * @return Event
     */
    public function event(): Event
    {
        return new Event($this);
    }

    /**
     * @return Settings
     */
    public function settings(): Settings
    {
        return new Settings($this);
    }

    /**
     * @return Notification
     */
    public function notification(): Notification
    {
        return new Notification($this);
    }

    /**
     * @return Search
     */
    public function serch(): Search
    {
        return new Search($this);
    }

    /**
     * @return FreeOrBusy
     */
    public function freeOrBusy(): FreeOrBusy
    {
        return new FreeOrBusy($this);
    }
    /**
     * @return SmartAdd
     */
    public function smartAdd(): SmartAdd
    {
        return new SmartAdd($this);
    }
}