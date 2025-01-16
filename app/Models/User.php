<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'departament_id',
        'imagen'
    ];

    public function departament(): BelongsTo{
        return $this->belongsTo(Departament::class);
    }
    public function roles(): BelongsToMany{
        return $this->belongsToMany(Role::class);
    }

    public function getRolesUserId(): array{
        return $this->roles()->pluck('role_id')->toArray();
    }

   
}
