<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = false;

    protected $table = 'trips';

    public function getDateAttribute(){
        return Carbon::parse($this->attributes['date'])->format('d.m.Y');
    }
}
