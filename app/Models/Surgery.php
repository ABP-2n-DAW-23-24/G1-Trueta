<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surgeryId'
    ];

    public function operations()
    {
        return $this->hasMany(Operation::class, 'surgeryId', 'id');
    }

}
