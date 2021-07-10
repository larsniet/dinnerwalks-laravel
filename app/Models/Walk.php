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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['max_booking_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name', 
        'description', 
        'location_id',
        'discount_code_id',
        "price", 
        "preview", 
        "pdf", 
        "max_people", 
        "max_booking_date", 
        "amount_booked", 
        "revenue",
        "status"
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function discountcode()
    {
        return $this->belongsTo(DiscountCode::class, 'discount_code_id');
    }

}
