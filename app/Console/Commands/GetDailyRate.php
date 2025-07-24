<?php

namespace App\Console\Commands;
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
    {
        //"https://kurs.resenje.org/api/v1/currencies/usd/rates/today";
        $response = Http::withoutVerifying()->get("https://kurs.resenje.org/api/v1/currencies/usd/rates/today");
        dd($response->json()["exchange_middle"]);
    }
}
