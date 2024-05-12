<?php

namespace App\Infrastructure\Eloquent\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function newFactory(){
        return new UserFactory;
    }

    public function tasksAssigned()
    {
        return $this->hasMany(Task::class, 'assigned_by_id');
    }

    public function tasksReceived()
    {
        return $this->hasMany(Task::class, 'assigned_to_id');
    }

    public function statistic()
    {
        return $this->hasOne(Statistic::class);
    }
}
