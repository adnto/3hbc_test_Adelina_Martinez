<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'departure_id',
        'destination_id',
        'departure_time',
        'arrival_time',
        'airline_id'
    ];

    public function departure()
    {
        return $this->belongsTo(Airport::class, 'departure_id');
    }

    public function destination()
    {
        return $this->belongsTo(Airport::class, 'destination_id');
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
