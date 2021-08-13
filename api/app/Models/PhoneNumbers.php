<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;

class PhoneNumbers extends Model
{
	public $timestamps = false;

	protected $hidden = ['password'];

	protected $with = [
		'users',
	];

	protected $fillable = [
		'fk_users_id',
		'phone_number',
		'password'
	];

	/**
	* Create phone number.
	* @param int $userId
	* @param int $phoneNumber
	* @param string $password
	*/
	public function createPhoneNumber(int $userId, int $phoneNumber, string $password): void
	{
		try{
			$password = \Hash::make($password);
			self::create([
				'fk_users_id' 	=> $userId,
				'phone_number' 	=> $phoneNumber,
				'password' 			=> $password
			]);
		} catch (\Throwable $th) {
			\Exceptions::throwDataBaseError($th);
		}
	}

	/**
	* @return PhoneNumbers
	*/
	public function get(): PhoneNumbers
	{
		return self::select()->get()->first();
	}

	/**
	* @return HasOne
	*/
	public function users(): HasOne
	{
		return $this->hasOne(
			(new User),
			'id',
			'fk_users_id'
		);
	}

}