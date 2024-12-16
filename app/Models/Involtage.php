<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Involtage extends Model
{
    protected $table = 'sitedata';
    protected $fillable = [
        'name', 'location', 'voltage', 'information'
    ];
}
