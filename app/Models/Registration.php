<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_register';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'id_tournament',
        'nickname',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'id_tournament');
    }
}
