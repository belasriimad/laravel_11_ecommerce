<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'body', 'is_free', 'price', 'admin_id'
    ];

    public function orders() {
        return $this->belongsToMany(Order::class); 
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getUrlAttribute($value)
    {
        return asset($value);
    }
}
