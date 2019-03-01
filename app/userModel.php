<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'user';
    protected $primarykey = 'username';
    protected $keyType = 'varchar';
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'lastname',
        'birthday',
    ];
    protected $dates = ['birthday'];
    protected $dateFormat = 'Y-m-d';
    protected $timestamp = false;
}
