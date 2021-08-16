<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ["command_id", "to_adress", "user_id", "from_adress", "sent_at"];

    public function delivereds()
    {
        return $this->hasMany(Delivered::class);
    }

    public function command()
    {
        return $this->belongsTo(Commande::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
