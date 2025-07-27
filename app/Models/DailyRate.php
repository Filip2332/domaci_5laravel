<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyRate extends Model
{
    protected $table = 'daily_rates';

    protected $fillable = ["currency","value"];
}
