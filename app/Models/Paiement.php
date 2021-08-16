<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        "command_id", "payment_id", "amount", "status",
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
