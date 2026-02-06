<?php

namespace App\Models;

use App\Models\Personnel;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['personnel_id', 'nom', 'description', 'type', 'prix', 'montant_total', 'image'];

    protected $casts = [
        'prix' => 'decimal:2',
        'montant_total' => 'decimal:2',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
