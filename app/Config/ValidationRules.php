<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Validation\ValidationRules as ShieldValidationRules;

class ValidationRules extends ShieldValidationRules
{
    public function getChangePasswordRules(): array
    {
        $passwordRules            = $this->getPasswordRules();
        $passwordRules['rules'][] = 'strong_password[]';

        return [
            'password'         => $passwordRules,
            'password_confirm' => $this->getPasswordConfirmRules(),
        ];
    }
}
