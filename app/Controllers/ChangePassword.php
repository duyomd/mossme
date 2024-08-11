<?php

declare(strict_types=1);

/**
 * Change user account password
 */

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Events\Events;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\ValidationException;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Traits\Viewable;
use CodeIgniter\Shield\Validation\ValidationRules;
use Psr\Log\LoggerInterface;

class ChangePassword extends BaseController
{
    use Viewable;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ): void {
        parent::initController(
            $request,
            $response,
            $logger
        );
    }

    public function show()
    {
        if (!auth()->loggedIn()) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        if (session('magicLogin')) {
            /** @var Session $authenticator */
            $authenticator = auth('session')->getAuthenticator();

            // If an action has been defined, start it up.
            if ($authenticator->hasAction()) {
                return redirect()->route('auth-action-show');
            }

            return $this->view(setting('Auth.views')['change_password']);
        }

        // If not from magic link
        return redirect()->to(config('Auth')->loginRedirect());
    }

    public function action(): RedirectResponse
    {
        if (!auth()->loggedIn()) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        $users = $this->getUserProvider();

        // Validate here first, since some things,
        // like the password, can only be validated properly here.
        $rules = $this->getValidationRules();

        if (! $this->validateData($this->request->getPost(), $rules, [], config('Auth')->DBGroup)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_keys($rules);
        $user              = $this->getUserEntity();
        var_dump($user);
        $user->fill($this->request->getPost($allowedPostFields));

        try {
            $users->save($user);            
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        // Success!
        return redirect()->back()->withInput()->with('message', lang('Auth.changePasswordSuccess'));
    }

    /**
     * Returns the User provider
     */
    protected function getUserProvider(): UserModel
    {
        $provider = model(setting('Auth.userProvider'));

        assert($provider instanceof UserModel, 'Config Auth.userProvider is not a valid UserProvider.');

        return $provider;
    }

    /**
     * Returns the Entity class that should be used
     */
    protected function getUserEntity(): User
    {
        return $this->getUserProvider()->findById(user_id());
    }

    /**
     * Returns the rules that should be used for validation.
     *
     * @return array<string, array<string, array<string>|string>>
     * @phpstan-return array<string, array<string, string|list<string>>>
     */
    protected function getValidationRules(): array
    {
        $rules = new ValidationRules();

        return $rules->getChangePasswordRules();
    }
}
