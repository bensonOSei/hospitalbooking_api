<?php

declare(strict_types=1);

namespace Benson\BookingApi\Validations;

class FormValidation
{
    /**
     * The data to be validated
     * @var array
     */
    private array $data;

    /**
     * The rules to be used for validation
     * @var array
     */
    private array $rules;

    /**
     * The errors that occur during validation
     * @var array
     */
    private array $errors = [];

    /**
     * The constructor
     * @param array $data | The data to be validated
     * @param array $rules | The rules to be used for validation
     */
    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    /**
     * The method that validates the data
     * @return array | The errors that occur during validation
     */
    public function validate(): array
    {
        foreach ($this->rules as $key => $value) {
            $rules = explode("|", $value);
            foreach ($rules as $rule) {
                if ($rule === "required") {
                    if (empty($this->data[$key])) {
                        $this->errors[$key] = "The $key field is required";
                    }
                }
                if ($rule === "text") {
                    if (!preg_match("/^[a-zA-Z ]*$/", $this->data[$key])) {
                        $this->errors[$key] = "The $key field must be a valid text";
                    }
                }
                if ($rule === "email") {
                    if (!filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$key] = "The $key field must be a valid email";
                    }
                }
                if ($rule === "phone") {
                    if (!preg_match("/^[0-9]{10}$/", $this->data[$key])) {
                        $this->errors[$key] = "The $key field must be a valid phone number";
                    }
                }
                if ($rule === "password") {
                    if (strlen($this->data[$key]) < 8) {
                        $this->errors[$key] = "The $key field must be a valid password";
                    }
                }
            }
        }
        return $this->errors;
    }

    /**
     * The method that checks if there are errors
     * @return bool | `true` if there are errors, `false` otherwise
     */
    public function hasErrors(): bool
    {
        return count($this->validate()) > 0;
    }


    /**
     * Sanitize the email provided by the user
     * @param string $data | The email to be sanitized
     * @return string  The sanitized email
     */
    public static function sanitizeEmail($data): string
    {
        return filter_var($data, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Sanitize the text inputs provided by the user
     * @param string $data | The text input to be sanitized
     * @return string  The sanitized text inputs
     */
    public static function sanitizeText($data): string
    {
        # Remove whitespace from the beginning and end of the string
        $data = trim($data);
        # Remove backslashes from the string
        $data = stripslashes($data);
        # Convert special characters to HTML entities
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Sanitize the phone number provided by the user
     * @param string $data | The phone number to be sanitized
     * @return string  The sanitized phone number
     */
    public static function sanitizePhoneNumber($data): string
    {
        return filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    }
}
