<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use Searchable, HasFactory;

    protected $guarded = [];

    public function seller(){
        return $this->belongsTo(User::class,'seller');
    }
    public function searchableAs()
    {
        return 'product_index';
    }  

    public function toSearchableArray()
    {
        
        return [
            'title' => $this->title,
            'body' => $this->body,
        ];
    }

    // public function getExcerptAttribute(){
    //     return str
    // }

    protected function firstChar($value):Attribute
    {
        return Attribute::make(
            get: fn($value) => ucfirst($value),
        );
    }
    // protected function getFirstChar($value)
    // {
    //     return 
    // }

    // already do many time to get date and set some value
}
