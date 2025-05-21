<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory , Notifiable;
    protected $fillable = [
        "name","desc","small_desc", "image", "price" , "user_id" , "category_id"
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    // book has relationships between user and category

    // we need to add relationships between tables

    // category  book
    ## (category) has many (book) belongs to


    // book user (many to one)
    ## user has many book belongs to





}
