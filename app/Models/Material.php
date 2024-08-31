<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'opening_balance'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(MaterialTransaction::class);
    }

    public function getCurrentBalanceAttribute()
    {
        // Calculate total inward and outward quantities
        $totalInward = $this->transactions()->where('quantity', '>', 0)->sum('quantity');
        $totalOutward = $this->transactions()->where('quantity', '<', 0)->sum('quantity');

        // Calculate current balance
        return $this->opening_balance + $totalInward + $totalOutward;
    }
}
