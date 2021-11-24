<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

   // protected $perPage = 25;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        "account_state",
        "department_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    /**
     * Always capitalize the first name when we retrieve it
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * Always capitalize the first name when we save it to the database
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function loginHistories()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function superAdmin()
    {
        return $this->hasOne(SuperAdmin::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function maintenanceTechnician()
    {
        return $this->hasOne(MaintenanceTechnician::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function workRequests()
    {
        return $this->hasMany(WorkRequest::class);
    }
}
