<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheet
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Laravel Google Sheets');
        $this->client->setScopes([Sheets::SPREADSHEETS]);
        $this->client->setAuthConfig(storage_path('app/google/credentials.json'));
        $this->client->setAccessType('offline');

        $this->service = new Sheets($this->client);
    }

    public function appendRow($spreadsheetId, $range, $values)
    {
        $body = new Sheets\ValueRange(['values' => [$values]]);
        $params = ['valueInputOption' => 'RAW'];

        return $this->service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    }
}
