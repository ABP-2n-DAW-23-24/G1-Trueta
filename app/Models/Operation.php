<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Surgery;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profilaxis'
    ];

    public function surgery()
    {
        return $this->belongsTo(Surgery::class, 'surgeryId');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'questions_operations', 'operationId', 'questionId');
    }
}
