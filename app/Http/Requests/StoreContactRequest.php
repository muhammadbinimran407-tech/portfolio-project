<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.max' => 'Name should be 255 characters or fewer.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Enter a valid email address like you@company.com.',
            'email.max' => 'Email should be 255 characters or fewer.',
            'subject.required' => 'Please add a subject for your message.',
            'subject.max' => 'Subject should be 255 characters or fewer.',
            'message.required' => 'Please write a message so I know how to help.',
            'message.min' => 'Tell me a little more — your message should be at least 10 characters.',
        ];
    }
}
