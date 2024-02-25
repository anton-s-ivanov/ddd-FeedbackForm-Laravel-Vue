<?php

namespace App\Domain\Feedback\Entities;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['name', 'phone', 'message'];
}
