<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'date', 'quantity'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}