<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use Searchable, HasFactory;

    protected $guarded = [];

    public function seller(){
        return $this->belongsTo(User::class,'seller');
    }

    public function toSearchableArray()
    {     
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
