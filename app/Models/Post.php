<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->name,
            'body' => $this->body,
        ];
    }

}
