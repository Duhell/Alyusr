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
      'AppliedJob',
      'PhoneNumber',
      'Email',
      'FileResume',
      'CoverLetter',
    ];
}
