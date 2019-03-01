<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookModel extends Model
{
    protected $table = 'book';
    protected $primarykey = 'id';
    protected $guarded    = ['id'];
    protected $fillable = [
        'quantity',
        'title',
        'description',
        'release_date',
    ];
    protected $dates = ['release_date'];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $timestamp = false;
}
