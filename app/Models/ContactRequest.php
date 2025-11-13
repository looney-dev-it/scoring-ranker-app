<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    //
    protected $fillable = [
        'from',
        'email',
        'subject',
        'message',
        'treated',
    ]; 
}
