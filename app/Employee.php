<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $guarded = ['id'];

    public $timestamps = true;

    public function devices()
    {
        return $this->belongsToMany('App\Device', 'devices_employees', 'emp_id', 'device_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Log', 'emp_id', 'id');
    }

    /**
     * [scopeEmp get Employee by pin]
     */
    public function scopeEmp($query, $pin)
    {
        return $query->where('pin', $pin)->first();
    }
}
