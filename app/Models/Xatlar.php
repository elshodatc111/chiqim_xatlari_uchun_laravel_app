<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xatlar extends Model
{
    protected $fillable = [
        'type',
        'where',
        'section',
        'fio',
        'nushalar',
        'page'
    ];
}
