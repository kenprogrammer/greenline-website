<?php

namespace App\Traits;

trait PasswordValidationTrait
{
    /**
     * Validate the given password.
     *
     * @param string $password
     * @param string|null $passwordConfirmation
     * @return string|null
     */
    public function validatePassword($password)
    {
        if (strlen($password) < 8) {
            return "Password MUST be at least 8 characters long!";
        }

        if (!preg_match('/[a-z]+/', $password)) {
            return "Password MUST contain at least one lowercase letter!";
        }

        if (!preg_match('/[A-Z]+/', $password)) {
            return "Password MUST contain at least one uppercase letter!";
        }

        if (!preg_match('/[0-9]+/', $password)) {
            return "Password MUST contain at least one digit!";
        }

        if (!preg_match('/[$@#&!~|{:}(|)%*?^]+/', $password)) {
            return "Password MUST contain at least one special character, e.g., $@#&!~|{:}(|)%*?^";
        }

        return null;
    }
}
