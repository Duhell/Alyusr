<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobDescription extends Model
{
    use HasFactory;

    protected $fillable = [
      'job_requirement',
      'job_description'
    ];

    public function jobtitle() : BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }
}
