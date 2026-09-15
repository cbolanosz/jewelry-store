<?php

/* Author: Cristian Bolaños */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['first_name'] - string - contains the user first name
     * $this->attributes['last_name'] - string - contains the user last name
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['password'] - string - contains the user hashed password
     * $this->attributes['phone'] - string - contains the user phone number
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['role'] - string - contains the user role (admin or client)
     * $this->attributes['registration_date'] - date - contains the user registration date
     * $this->attributes['active'] - bool - contains whether the user is active
     * $this->attributes['remember_token'] - string - contains the user remember me token
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'registration_date',
        'active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function setFirstName(string $firstName): void
    {
        $this->attributes['first_name'] = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->attributes['last_name'] = $lastName;
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function setPhone(string $phone): void
    {
        $this->attributes['phone'] = $phone;
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function setRegistrationDate(string $registrationDate): void
    {
        $this->attributes['registration_date'] = $registrationDate;
    }

    public function setActive(bool $active): void
    {
        $this->attributes['active'] = $active;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getFirstName(): string
    {
        return $this->attributes['first_name'];
    }

    public function getLastName(): string
    {
        return $this->attributes['last_name'];
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function getRegistrationDate(): string
    {
        return $this->attributes['registration_date'];
    }

    public function getActive(): bool
    {
        return $this->attributes['active'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function login(): void
    {
        Auth::login($this);
    }

    public function logout(): void
    {
        Auth::logout();
    }

    public function changePassword(string $newPassword): void
    {
        $this->setPassword($newPassword);
        $this->save();
    }
}
