<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walk extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'walks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'locatie', 'beschrijving'
    ];

    public function boeking() 
    {
        return $this->hasOne(Boeking::class, 'walk_id');
    }   

    public function horeca()
    {
        return $this->hasMany(Horeca::class, 'walk_id');
    }

}

