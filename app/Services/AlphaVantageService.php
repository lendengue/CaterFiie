<?php

namespace App\Services;

use GuzzleHttp\Client;

class AlphaVantageService{
    const BASE_URL = 'https://www.alphavantage.co';
    const API_KEY = 'ZMMGGL54AD3B3UBY';

    protected $client;

    public function __construct(){
        $this->client = new Client([
            'verify' => false,
        ]);
    }

    public function getStockQuote($stock){
        $url = self::BASE_URL . "/query?function=GLOBAL_QUOTE&symbol=$stock&apikey=" . self::API_KEY;
        $response = $this->client->request('GET', $url);
        $data = json_decode($response->getBody(), true);
        
        if (isset($data['Global Quote'])) {
            $globalQuote = $data['Global Quote'];
            return [
                'symbol' => $globalQuote['01. symbol'],
                'open' => $globalQuote['02. open'],
                'high' => $globalQuote['03. high'],
                'low' => $globalQuote['04. low'],
                'price' => $globalQuote['05. price'],
                'volume' => $globalQuote['06. volume'],
                'latest_trading_day' => $globalQuote['07. latest trading day'],
                'previous_close' => $globalQuote['08. previous close'],
                'change' => $globalQuote['09. change'],
                'change_percent' => $globalQuote['10. change percent']
            ];
        }
        return null;
    }
}