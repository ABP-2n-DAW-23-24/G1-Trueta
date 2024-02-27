<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Model\Surgery;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function surgery()
    {
        return $this->belongsTo(Surgery::class, 'surgeryId');
    }
}
