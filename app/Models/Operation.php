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

    public function QuestionsOperation()
    {
        return $this->hasMany(QuestionsOperation::class, 'questionId', 'id');
    }
}
