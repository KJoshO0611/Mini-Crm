<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $table = 'companies';
    /**
    * The primary key associated with the table.
    *
    * @var string
    */
   protected $primaryKey = 'id';

   public $timestamps = false;

    public function employee(){

        return $this->hasMany('App\Employees');

    }
}
