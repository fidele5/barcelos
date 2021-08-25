<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        "client_id", "comment", "status",
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function articles()
    {
        return $this->BelongsToMany(Article::class)->withPivot("quantity", "id");
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'command_id', 'id');
    }

}
