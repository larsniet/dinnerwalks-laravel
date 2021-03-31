<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Walk;

class Boeking extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boekingen';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datum', 'kortingscode', 'locatie', 'personen'
    ];

    public function customer() 
    {
        return $this->belongsTo(Customer::class);
    }

    public function walk()
    {
        return $this->belongsTo(Walk::class);
    }

}
