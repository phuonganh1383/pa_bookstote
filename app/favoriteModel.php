<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class favoriteModel extends Model
{
    protected $table        = 'favorite';
    protected $guarded      = ['id', 'username',];
    protected $primaryKey   = ['id', 'username'];
    protected $fillable = [
        'id',
        'username',
        'create_at',
        'update_at',
    ];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $timestamp = false;
}
