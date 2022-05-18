<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable=['title','company','location','website','description','tags','email'];

    //filter list of listings by query provided
    public static function scopeFilter($query, array $filters){
        //Filter by tag query
        if ($filters['tag']??false) {
            $query->where('tags','like','%'.$filters['tag'].'%');
        }

        //FIlter by search
         if ($filters['search']??false) {
            $query->where('title','like','%'.$filters['search'].'%')
            ->orWhere('description','like','%'.$filters['search'].'%')
            ->orWhere('tags','like','%'.$filters['search'].'%');
        }
    }
}
