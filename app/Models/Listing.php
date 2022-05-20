<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable=['title','user_id','company','location','website','description','tags','email','logo'];

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

    //Relationship to user
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
