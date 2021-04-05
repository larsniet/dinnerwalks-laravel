<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Boeking;
use Laravel\Cashier\Billable;


class Customer extends Model
{
    use HasFactory;
    use Billable;

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
        'name', 'email', 'phone'
    ];

    public function boeking() 
    {
        return $this->hasOne(Boeking::class, 'customer_id');
    }   

}
