<?php

namespace App\Controllers\V1\Auth;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Entities\User;
use Config\Validation;

class SignupController extends BaseController
{
    use ResponseTrait;

    public function signup(): ResponseInterface
    {
        $data = $this->request->getJSON(true);

        try {
            // validate
            $validator = service("validation");

            if (!$validator->run($data, 'signup')) {
                return $this->fail($validator->getErrors(), $this->codes['unauthorized']);
            }

            $user = new User([
                'email' => $data['email'],
                'password' => $data['password'],
                'username' => $data["username"],
            ]);

            $userProvider = auth()->getProvider();
            $userProvider->save($user);

            return $this->respond(getJWTResponseArray($user));
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage());
        }
    }
}
