<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    protected $table = "coments";

    protected $fillable = [
        'descricao',
        'event_id',
        'user_id'
    ];
}
