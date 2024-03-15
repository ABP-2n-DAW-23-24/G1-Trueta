<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'questionId',
        'operationId',
    ];
}
