<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
	protected $fillable = ['fName', 'lName', 'email', 'mobile', 'gender', 'DOB', 'comments'];
}
