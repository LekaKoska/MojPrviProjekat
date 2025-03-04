<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Carbon\Carbon;
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




        foreach (ExchangeRates::AVAILABLE_CURRENCIES as $currency)
        {
            $todayCurrency = ExchangeRates::getCurrencyExchanges($currency);

            if($todayCurrency !== null)             //   Ako postoji podatak da nije null znaci da ta valuta sa tim datumom postoji i da je preskocimo
            {
                continue;
            }

            $response = Http::get("https://kurs.resenje.org/api/v1/currencies/$currency/rates/today");

            $jsonResponse = $response->json();


            ExchangeRates::create(
                [
                    'currency' => $currency,
                    'value' => $jsonResponse['exchange_middle']
                ]);


        }




    }


}
