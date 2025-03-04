<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    const CURRENCY_EUR = ['eur'];

    const CURRENCY_USD = ['usd'];

    const CURRENCY_RUB = ['rub'];

    const AVAILABLE_CURRENCIES = [

        self::CURRENCY_RUB, self::CURRENCY_EUR, self::CURRENCY_USD,
    ];

    protected $table = "exchange_rates";

    protected $fillable = ['currency','value'];

    public static function  getCurrencyExchanges($currency)
    {
        return self::where('currency', $currency) // Trazimo gde je currency = $currency(usd, eur)
        ->whereDate('created_at', Carbon::now())                // Trazimo i po datumu gde je danasnji
        ->first();
    }
}
