<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $guarded = ['id'];

    public $timestamps = true;

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'emp_id', 'id');
    }

    public function device()
    {
        return $this->belongsTo('App\Device', 'device_id', 'id');
    }
}
