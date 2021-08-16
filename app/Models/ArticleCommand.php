<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCommand extends Model
{
    use HasFactory;

    public $table = "article_commande";
    protected $fillable = [
        "article_id", "quantity", "commande_id",
    ];

    public function delivereds()
    {
        return $this->hasMany(Delivered::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
