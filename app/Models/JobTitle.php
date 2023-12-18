<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = ['job_image','job_position','job_location'];

    public function jobDescriptions() : HasMany
    {
        return $this->hasMany(JobDescription::class);
    }
}
