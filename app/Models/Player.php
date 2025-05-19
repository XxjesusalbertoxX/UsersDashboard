<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_player';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'lastName',
        'age',
        'genre',
        'id_team',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'id_team');
    }
}