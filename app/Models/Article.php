<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        "designation", "description", "thumbnails", "sku", "price", "categorie_id", "location_id", "tarif_id",
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot("quantity");
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
