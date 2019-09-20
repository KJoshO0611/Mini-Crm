<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $table = 'employees';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function companies(){
		return $this->belongsTo('App\Companies');
	}
}
