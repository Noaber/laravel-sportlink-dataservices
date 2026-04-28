<?php
return [
    'base_uri' => 'https://data.sportlink.com/',
    'client_id' => env('SPORTLINK_CLUB_DATA_CLIENT_ID'),
    'http_timeout' => env('SPORTLINK_CLUB_DATA_HTTP_TIMEOUT', 45),
    'http_retry' => env('SPORTLINK_CLUB_DATA_HTTP_RETRY', 3),
];