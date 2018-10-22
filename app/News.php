<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @inheritdoc
     */
    protected $table = 'news';

    /**
     * @inheritdoc
     */
    protected $fillable = ['title', 'text'];
}
