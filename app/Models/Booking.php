<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Walk;
use App\Models\Customer;
use App\Models\DiscountCode;

class Booking extends Model
{
    use HasFactory;
    use Search;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'walk_id', 
        'customer_id', 
        'date', 
        'unique_code', 
        'discount_code', 
        'amount_persons', 
        'price',
        'status'
    ];

    protected $searchable = [
        'discount_code',
        'unique_code',
        'date',
        'amount_persons'
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
