<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Contracts\LaratrustUser;
use Laratrust\Traits\HasRolesAndPermissions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class User extends Authenticatable implements LaratrustUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, FilterQueryString, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'contact_number',
        'whatsapp_number',
        'image',
        'google_id'
    ];

    protected $filters = ['like'];

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
    public function has_role(string $roleName): bool
    {
        // First verify the user has a role assigned
        if (!$this->role) {
            return false;
        }
        // Compare the user's role name with the specified role name
        return $this->role->name === $roleName;
    }
    public function listings(){
        return $this->hasMany(Listing::class);
    }
    public function socialMediaAccounts()
    {
        return $this->hasOne(SocialMediaAccounts::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
    public function location()
    {
        return $this->hasOne(Location::class);
    }
    public function isOnline()
    {
        return cache()->has('user-is-online-' . $this->id);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
