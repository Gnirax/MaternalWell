<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;//I added this

/**
 * Summary of Maternal_users
 */
class Maternal_users extends Model implements Authenticatable
{
    use HasFactory;

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'surname',
        'birthdate',
        'sex',
        'region',
        'address',
        'phone_number',
        'username',
        'email',
        'role',
        'password',
    ];

    /**
     * Summary of hidden
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Summary of casts
     * @var array
     */
    protected $casts = [
        'password'=> 'hashed'
    ];

    //am adding the following
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'username'; // Use the appropriate column name for the username
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password; // Use the appropriate column name for the password
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // Other methods as needed

    public function mothers(){
        return $this->hasOne(Mothers::class);
    }

    public function doctors(){
        return $this->hasOne(Doctors::class);
    }

    public function nurses(){
        return $this->hasOne(Nurses::class);
    }
}






















    /**
     * If I was using id and password
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */

    /*
    public function getAuthIdentifierName()
    {
        return 'id'; // Replace with the appropriate column name
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed


    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string

    public function getAuthPassword()
    {
        return $this->password; // Replace with the appropriate column name
    }

    */
    // Other methods as needed

