<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question'];

    // Relación uno a muchos inversa desde QuestionOpMed hacia Question
    public function questionOpMed()
    {
        return $this->hasMany(QuestionOpMed::class, 'Q_id', 'id');
    }

    public function operations()
    {
        return $this->belongsToMany(Operation::class, 'questions_operations', 'operationId', 'questionId');
    }
    use HasFactory;
}
