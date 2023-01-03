<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['published_at'];

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function getPublishedDateAttribute()
    {
        return is_null($this->published_at) ? ' ' : $this->published_at->diffForHumans();
    }

    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if($showTimes) $format = $format.' '. "H:i:s A";
        return $this->created_at->format($format);
    }

    public function  publicationLabel()
    {
        if(!$this->published_at){
            return '<span class="badge text-bg-warning"> Draft </span>';
        }elseif($this->published_at > Carbon::now()){
            return '<span class="badge text-bg-info"> Schedule </span>';
        }else{
            return '<span class="badge text-bg-success"> Published </span>';
        }
    }
}
