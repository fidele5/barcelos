<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivered extends Model
{
    use HasFactory;
    protected $fillable = ["delivery_id", "article_command_id"];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function article_command()
    {
        return $this->belongsTo(ArticleCommand::class);
    }
}
