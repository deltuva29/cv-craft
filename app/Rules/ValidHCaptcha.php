<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Translation\PotentiallyTranslatedString;

class ValidHCaptcha implements ValidationRule
{
    /**
     * The hCaptcha secret key.
     */
    private string $secretKey;

    /**
     * Constructor.
     *
     * @param  string  $secretKey
     */
    public function __construct(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail(__('The hCaptcha token is required.'));
            return;
        }

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => $this->secretKey,
            'response' => $value,
        ]);

        if ($response->failed() || !$response->json('success', false)) {
            $fail(__('The hCaptcha validation failed.'));
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'error hcaptcha';
    }
}
