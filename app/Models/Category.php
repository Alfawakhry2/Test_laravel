<?php

namespace App\Models;
use Database\Factories\UserFactory;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory , Notifiable;
    //
    protected $fillable = [
        "name" , "desc" , "image"
    ];


    // relationships

    public function books(){
        return $this->hasMany(Book::class);
    }
}
