<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Walk;

class Horeca extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'horecas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naam', 'email', 'logo', 'adres', 'instagram', 'facebook', 'website', 'walk_id'
    ];

    public function walk()
    {
        return $this->belongsTo(Walk::class);
    }
}
