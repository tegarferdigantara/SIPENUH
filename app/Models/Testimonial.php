<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $table = 'testimonials';
    protected $keyType = 'int';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'content'
    ];
    public $timestamps = true;
    public $incrementing = true;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
