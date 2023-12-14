<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
      'FirstName',
      'MiddleName',
      'LastName',
      'PhoneNumber',
      'Email',
      'FileResume',
      'CoverLetter',


    ];
}
