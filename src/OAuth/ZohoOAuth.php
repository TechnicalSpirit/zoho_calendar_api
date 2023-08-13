<?php

namespace Zoho\Api\Calendar\OAuth;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ZohoOAuth
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $refreshToken;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    public function __construct(Client $client,
                                string $domain,
                                string $accessToken,
                                string $refreshToken,
                                string $clientId,
                                string $clientSecret)
    {
        $this->client = $client;
        $this->domain = $domain;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getRefreshToken(): ResponseInterface
    {
        $url = $this->domain . '/oauth/v2/token?refresh_token=' . $this->refreshToken .
            '&client_id=' . $this->clientId .
            '&client_secret=' . $this->clientSecret .
            '&grant_type=refresh_token';

        return $this->client->post($url);
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function getRevokeRefreshToken(): ResponseInterface
    {
        return $this->client->post("$this->domain/oauth/v2/token/revoke?token=$this->refreshToken");
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return void
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }
}