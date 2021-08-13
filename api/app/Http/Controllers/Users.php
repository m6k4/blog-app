<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use App\Models\PhoneNumbers as PhoneNumbersModel;
use App\Models\Post as PostModel;
use App\Models\Topic as TopicModel;
use App\Http\Requests\Users\{ CreateUserPost, GetUsersList };
use Illuminate\Http\JsonResponse;

/**
* User
* Class to manage the endpoints authorization.
*
* @subpackage Controller
*/
class Users extends Controller
{
    public function __construct(
        private UserModel $userModel,
        private PostModel $postModel,
        private TopicModel $topicModel,
        private PhoneNumbersModel $phoneNumbersModel
        ) {}

    /**
    * Create user.
    *
    * @param CreateUserPost $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function createUser(CreateUserPost $request): JsonResponse
    {
        $this->success();
        
        \DB::transaction(function () use($request) {
            $user = $this->userModel->createUser($request->only('name', 'email')); 
            $this->phoneNumbersModel->createPhoneNumber($user->id, $request->phone_number, $request->password);
        });

        return $this->output();
    }

    /**
    * Get list
    *
    * @param GetUsersList $request
    * @return JsonResponse
    */
    public function getList(GetUsersList $request): JsonResponse
    {
        $this->success();

        $result = $this->postModel->get();

        $this->response['data'] = $result;

        return $this->output();
    }
}