<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $isbn
 * @property string $title
 * @property string $author
 * @property string $summary
 * @property string $publisher
 * @property string $year
 * @property string $created_at
 * @property string $updated_at
 */
class Books extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['isbn', 'title', 'author', 'summary', 'publisher', 'year', 'created_at', 'updated_at'];

}
