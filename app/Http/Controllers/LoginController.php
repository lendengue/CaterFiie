<?php

namespace App\Http\Controllers;

use App\Services\AlphaVantageService;

use Illuminate\Http\Request;

class LoginController extends Controller{
    protected $alphaVantageService;

    public function __construct(AlphaVantageService $alphaVantageService){
        $this->alphaVantageService = $alphaVantageService;
    }

    public function getStockInfo(){
        $stockData = $this->alphaVantageService->getStockQuote('AAPL');
        dd($stockData);
    }
}
