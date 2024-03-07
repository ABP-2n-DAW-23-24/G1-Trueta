<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOpMed extends Model
{
    protected $fillable = ['Q_id', 'OpMed_id'];

    // Relación muchos a uno desde QuestionOpMed hacia Question
    public function question()
    {
        return $this->belongsTo(Question::class, 'Q_id', 'id');
    }
    public function opMeds()
    {
        return $this->belongsToMany(_OpMed::class, 'questions_op_med', 'Q_id', 'OpMed_id');
    }
    use HasFactory;
}
