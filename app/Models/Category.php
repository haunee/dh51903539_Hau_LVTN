<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamp = false;
    protected $fillable = ['CategoryName'];
    protected $primaryKey = 'idCategory';
    protected $table = 'category';
}
