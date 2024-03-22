<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraDetail extends Model
{
    protected $fillable = [
        'info',
        'operationId',
        'surgeryId'
    ];

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operationId');
    }

    public function surgery()
    {
        return $this->belongsTo(Surgery::class, 'surgeryId');
    }
}