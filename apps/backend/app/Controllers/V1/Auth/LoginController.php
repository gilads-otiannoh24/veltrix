<?php

namespace App\Controllers\V1\Auth;

use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Services\AuthService;

class LoginController extends BaseController
{
    use ResponseTrait;

    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Authenticate Existing User and Issue JWT.
     */
    public function emailPasswordLogin(): ResponseInterface
    {
        $rules = $this->getValidationRules();

        if (! $this->validateData($this->request->getJSON(true), $rules, [], config('Config\Auth')->DBGroup)) {
            return $this->fail(
                ['errors' => $this->validator->getErrors()],
                $this->codes['unauthorized']
            );
        }

        $credentials = $this->request->getJsonVar(setting('Auth.validFields'));
        $credentials = array_filter($credentials);
        $credentials['password'] = $this->request->getJsonVar('password');

        $authResult = $this->authService->authenticateUser($credentials);

        if (! $authResult['success']) {
            return $this->failUnauthorized($authResult['message']);
        }

        return $this->respond(getJWTResponseArray($authResult['user']));
    }

    protected function getValidationRules(): array
    {
        return (new \CodeIgniter\Shield\Validation\ValidationRules())->getLoginRules();
    }

    public function googleLogin(): void {}

    public function facebookLogin(): void {}
}
