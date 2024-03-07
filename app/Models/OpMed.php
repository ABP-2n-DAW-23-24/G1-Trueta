<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpMed extends Model
{
    protected $fillable = ['Op_id', 'Med_id'];

    // Relación muchos a muchos con QuestionOpMed
    public function questionOpMeds()
    {
        return $this->belongsToMany(QuestionOpMed::class, 'questions_op_med', 'OpMed_id', 'Q_id');
    }
    use HasFactory;
}
