<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Role extends Model
{
    protected $fillable = ['nombre', 'color'];
    public $timestamps = false;


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function nombre(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => lcfirst($value),
        );
    }
}
