<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'contactNo',
        'companyRegistration',
        'email',
        'message',
        'inquireDocs',
        'national_id',
        'company_registration',
        'otherDocs'
    ];
}
