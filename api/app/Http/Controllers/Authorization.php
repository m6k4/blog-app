<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Authorization as AuthorizationModel;
use App\Models\User as UserModel;
use App\Models\PhoneNumbers as PhoneNumbersModel;
use App\Http\Requests\Authorization\{LoginToPlatformPost, CheckIfUserSessionExistsGet, LogoutFromPlatformDelete};
use Illuminate\Support\Facades\DB;

/**
* Authorization
* Class to manage the endpoints authorization.
*
* @subpackage Controller
*/
class Authorization extends Controller
{

    /**
    * @var ?\stdClass $user
    */
    private $loggedNumberSessionDetails = null;

    /**
    * constructor
    *
    * @param private AuthorizationModel $authorizationModel
    * @param private UserModel $userModel
    */
    public function __construct(
        private AuthorizationModel $authorizationModel,
        private UserModel $userModel,
        private PhoneNumbersModel $phoneNumbersModel
        ) {}

    /**
    * login to platform.
    *
    * @param LoginToPlatformPost $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function loginToPlatform(LoginToPlatformPost $request): \Illuminate\Http\JsonResponse
    {
        $this->success();
        
        $this->loggedNumberSessionDetails = $this->phoneNumbersModel->where('phone_number', $request->phone_number)->first();

        $this->checkPassword($request->password);
        
        $this->response['data'] = $this->authorizationModel->createSession($this->loggedNumberSessionDetails);
     
        return $this->output();
    }

    /**
    * logout from platform.
    *
    * @param LoginToPlatformPost $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function logoutFromPlatform(LogoutFromPlatformDelete $request): \Illuminate\Http\JsonResponse
    {
        $this->success();

        \Session::flush();
        $this->response['data'] = $this->authorizationModel->destroyAllNumberSessions(\SUser::getUserData()->fk_phone_numbers_id);
        
        return $this->output();
    }

    /**
    * check if user session exists.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function checkIfUserSessionExists(CheckIfUserSessionExistsGet $request): \Illuminate\Http\JsonResponse
    {
        $this->success();
        
        $this->authorizationModel->checkIfUserSessionExists();
        
        $this->response['data'] = \SUser::getUserData();
        
        return $this->output();
    }

    /**
    * check password
    *
    * @param string $password
    * @return \Illuminate\Http\JsonResponse
    */
    private function checkPassword(string $password) {
        if(!\Hash::check($password, $this->loggedNumberSessionDetails->password)) {
            \Exceptions::throwForbiddenError();
        }
    }

}