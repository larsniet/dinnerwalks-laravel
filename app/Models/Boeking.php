<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Walk;
use App\Models\Customer;
use App\Models\Search;

class Boeking extends Model
{
    use HasFactory;
    use Search;

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

    protected $searchable = [
        'kortingscode',
        'datum',
        'locatie', 
        'personen'
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
