<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','author','isbn','total_copies','available_copies','description'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}