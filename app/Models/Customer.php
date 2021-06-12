<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boeking;
use Laravel\Cashier\Billable;
use App\Models\Search;

class Customer extends Model
{
    use HasFactory;
    use Billable;
    use Search;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naam', 'email', 'telefoonnummer'
    ];

    protected $searchable = [
        'naam',
        'email',
        'telefoonnummer'
    ];

    public function boeking() 
    {
        return $this->hasOne(Boeking::class, 'customer_id');
    }   

}
