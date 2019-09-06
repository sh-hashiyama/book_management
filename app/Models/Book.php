<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * 主キー
     *
     * @var string
     */
    protected $primaryKey = 'isbn';

    protected $fillable = ['title', 'isbn', 'image_url'];
}
