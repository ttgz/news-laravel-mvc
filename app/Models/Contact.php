<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $table = 'contact';
    protected $filltable = ['id','name','numberphone','email','address','facebook','about','logo'];
    public $timestamps = false;
}
