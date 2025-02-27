<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealMoneyConvert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:real-money-convert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command about money convert';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url ="https://v6.exchangerate-api.com/v6/".env("MONEY_API_KEY")."/latest/USD";
        $response = Http::get($url);

    $jsonResponse = $response->json();
    dd($jsonResponse['conversion_rates']['USD'], $jsonResponse['conversion_rates']['EUR']);

    }


}
