<?php

namespace Robertgarrigos\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];
    protected $table = 'contacts';
    public $fillable = ['name', 'email', 'message'];
}
