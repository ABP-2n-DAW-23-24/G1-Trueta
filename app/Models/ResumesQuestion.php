<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumesQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionOperationId',
        'resumeId',
    ];
}
