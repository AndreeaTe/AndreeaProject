<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table ='patient';

    protected $fillable = ['firstName', 'lastName', 'CNP','occupation','job'];
}
