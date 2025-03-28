<?php

namespace App\Services;

use CodeIgniter\Shield\Models\LoginModel;
use CodeIgniter\Shield\Models\TokenLoginModel;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Shield\Entities\User;

class AuthService
{
    use ResponseTrait;

    private LoginModel $authLoginModel;
    private TokenLoginModel $authTokenLoginModel;
    private bool $canLogIn = true;
    private bool $canRegister = true;
    private bool $canResetPassword = true;
    private bool $canChangeEmail = true;
    private bool $canChangePassword = true;

    public function __construct()
    {
        $this->authLoginModel = new LoginModel();
        $this->authTokenLoginModel = new TokenLoginModel();
    }

    public function authenticateUser(array $credentials): array
    {
        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();

        $this->loginAttemptTracking($credentials['email']);

        if (!$this->canLogIn) {
            return ['success' => false, 'message' => 'Too many login attempts.'];
        }

        $result = $authenticator->check($credentials);

        if (!$result->isOK()) {
            $this->recordLoginAttempt($credentials['email'], 'email_password', false);
            return ['success' => false, 'message' => $result->reason()];
        }

        $user = $result->extraInfo();
        $this->recordLoginAttempt($credentials['email'], 'email_password', true, $user->id);

        return ['success' => true, 'user' => $user];
    }

    public function recordLoginAttempt(string $email, string $identifier, bool $success, ?int $user_id = null): void
    {
        $this->authTokenLoginModel->recordLoginAttempt(
            $identifier,
            $email,
            $success,
            request()->getIPAddress(),
            request()->getUserAgent(),
            $user_id,
        );

        $this->authLoginModel->recordLoginAttempt(
            $identifier,
            $email,
            $success,
            request()->getIPAddress(),
            request()->getUserAgent(),
            $user_id,
        );

        log_message('info', ($success ? 'Successful' : 'Failed') . " login attempt recorded for user: " . $email);
    }

    public function registerUser(array $userData): array
    {
        $userModel = model('UserModel'); // Ensure you have a UserModel

        if ($userModel->insert($userData)) {
            return ['success' => true, 'user' => $userModel->find($userModel->insertID())];
        }

        return ['success' => false, 'message' => 'User registration failed.'];
    }

    // TODO: Implement other authentication methods (e.g., Google, Facebook) here

    public function loginAttemptTracking(string $email): void
    {
        // TODO: Implement login attempt tracking
        $user = auth()->getProvider()->findByCredentials(['email' => $email]);

        if (!$user) {
            return;
        }

        $loginAttempts = $this->authLoginModel->where('user_id', $user->id)
            ->where('date >=', date('Y-m-d H:i:s', strtotime('-1 hour')))
            ->countAllResults();
        if ($loginAttempts >= 5) {
            $user->ban('Too many login attempts');
            log_message('warning', "User {$user->email} has exceeded login attempts.");
            $this->canLogIn = false;
        }
    }

    public function unBanUser(User $user): void
    {
        if ($user->isBanned()) {
            $user->unban();
        }
    }
}
