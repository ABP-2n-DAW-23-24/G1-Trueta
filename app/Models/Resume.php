<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume',
        'questionId',
        'operationId'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'questionId');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operationId');
    }
}
