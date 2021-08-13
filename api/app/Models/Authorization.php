<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;
use App\Models\{PhoneNumbers, User};

class Authorization extends Model
{
	public $timestamps = false;

	protected $table = 'sessions';

	protected $hidden = ['password'];

	protected $fillable = [
		'token',
		'expired_at',
		'fk_users_id',
		'fk_phone_numbers_id'
	];
		
	protected $with = [
		'phoneNumbers',
	];

	/**
	* Login to platform.
	* @return string $token
	*/
	public function createSession(PhoneNumbers $phoneNumberDetails): string
	{
		try{
				$token = \Str::random(255);
				\DB::beginTransaction();
					$this->destroyAllNumberSessions($phoneNumberDetails->id);
				
				 self::create([
						'fk_users_id' 				=> $phoneNumberDetails->users->id,
						'fk_phone_numbers_id' => $phoneNumberDetails->id,
						'expired_at'  				=> Carbon::now()->addHours(3),
						'token'								=> $token
					]);

				\Session::put('user.cookie.session', $token);
				\DB::commit();
				return $token;
		} catch (\Throwable $th) {
			\DB::rollback();
			\Exceptions::throwDataBaseError($th);
		}
	}

	/**
	* Check if user session exists
	* @return  Authorization
	*/
	public function checkIfUserSessionExists(): Authorization
	{
		$token = \Session::all()['user']['cookie']['session'] ?? '';

		try{
			$userSession = self::select()
				->where('token', $token)
				->get()
				->first();
			
		} catch (\Throwable $th) {
			\Exceptions::throwDataBaseError($th);
		}
	
		if(!$userSession)
			\Exceptions::throwForbiddenError();

		\SUser::setUserData($userSession);

		return $userSession;
	}

	/**
	* Destroy all user sessions
	*/
	public function destroyAllNumberSessions(int $phoneNumberId)
	{
		self::where('fk_phone_numbers_id', $phoneNumberId)
			->delete();
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

	/**
	* @return HasOne
	*/
	public function phoneNumbers(): HasOne
	{
		return $this->hasOne(
			(new PhoneNumbers),
			'id',
			'fk_phone_numbers_id'
		);
	}

}