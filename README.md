# Zoho calendar API

it's a library for interacting with one of the many zoho applications - zoho calendar.

## How to install this package to your project ?

Add this text to composer.json
```
    "require": {
        "zoho/calendar_api": "dev-main"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/TechnicalSpirit/zoho_calendar_api"
        }
    ]
```

Write this command to console
```
    composer update
```

## Example
```php
$api_config = [
    "domain" => "https://accounts.zoho.com",
    "accessToken" => "1000.2700ef980e286a21230b1d7ae01cc",
    "refreshToken" => "1000.2290e0525f93aa6c3ea650936319",
    "clientId" => "1000.J2IN1FP3WQLSC7L7UIKfQ0FSAYUYWDV",
    "clientSecret" => "0cc483s285ebbb9f57c51c9142b550d8693351b2f"
];
$client  = new ZohoCalendarAPI(
    $api_config["domain"],
    $api_config["accessToken"],
    $api_config["refreshToken"],
    $api_config["clientId"],
    $api_config["clientSecret"]);

$result = $client->calendar()->getAllCalendar();
$result = json_decode($result->getBody()->getContents(), true);

print_r($result);
```

if you want to learn more about the zoho calendar API, then read the [documentation](https://www.zoho.com/calendar/help/api/introduction.html)
