<?php

namespace App\Console\Commands;
use App\Models\DailyRate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;

class GetDailyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency-get-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get todays rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {$currencies = ["usd", "eur", "rub"];


        foreach ($currencies as $currency) {


            $todaysCurrency = DailyRate::where('currency', $currency)
                ->whereDate('created_at', Carbon::now())
                ->first();

            if($todaysCurrency !== null) {
                continue;
            }


            //"https://kurs.resenje.org/api/v1/currencies/usd/rates/today";
            $response = Http::withoutVerifying()->get("https://kurs.resenje.org/api/v1/currencies/usd/rates/today");
            DailyRate::create([
                'currency' => $currency,
                'value' => $response->json()["exchange_middle"]]);
            echo strtoupper($currency) . ": " . $response->json()["exchange_middle"] . PHP_EOL;

        }
    }
}
