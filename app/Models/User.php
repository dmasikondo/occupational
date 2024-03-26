<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'must_reset',
        'remember_token',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }


    /**
     * Assign user a role
     */

    public function assignRole($role)
    {
       // $check_if_role_exists = Role::where('name',$role)->get();


        return $this->roles()->save(Role::firstOrCreate(['name' =>$role]));
    }

    /**
      * Check if the user has role of
    */
    public function hasRole($role)
    {
        return  (bool) $this->roles()->where('name',$role)->count();
    }
    /**
     * Get the user's first name capitalised first letter.
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    /**
     * Get the user's surname capitalised first letter.
     */
    protected function surname(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }


}
