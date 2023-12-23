<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'harga',
        'stok'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
