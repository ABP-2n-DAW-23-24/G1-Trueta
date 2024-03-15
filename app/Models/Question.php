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

    public function QuestionOperation(){
        return $this->belongsTo(Operation::class, 'operation_id', 'id');
    }
    use HasFactory;
}
