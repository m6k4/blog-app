<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{

	protected $fillable = [
		'name',
		'email',
	];

	/**
	* Create user.
	* @param array $params
	* @return User
	*/
	public function createUser(array $params): User
	{
		try{
			return self::create($params);
		} catch (\Throwable $th) {
			\Exceptions::throwDataBaseError($th);
		}
	}

	/**
	* 
	*/
	public function get(): array
	{
		return self::select()->get()->toArray();
	}

	/**
	* 
	*/
	public function posts(): HasMany 
	{
		return $this->hasMany(Post::class, 'author_id');
	}

}