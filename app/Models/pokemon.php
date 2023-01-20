<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'pokemon';
    protected $fillable = [
        'ID',
        'number_pokede',
        'user_id'
    ];
}
