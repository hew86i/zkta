<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';

    protected $guarded = ['id'];

    public $timestamps = true;

    public function employees()
    {
        return $this->belongsToMany('App\Employee', 'devices_employees', 'device_id', 'emp_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Log', 'device_id', 'id');
    }

}
