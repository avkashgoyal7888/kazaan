<?php

namespace App\Livewire\Web;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $user_id = '';
    public $password = '';
    public $user_idError = '';
    public $passwordError = '';
    public $generalError = '';

    public function mount()
    {
        if (Auth::check() && Auth::user()->type === 'User') {
            redirect()->route('web.home')->with('navigate');
        }
    }


    protected $rules = [
        'user_id' => 'required|string',
        'password' => 'required|string',
    ];

    protected $messages = [
        'user_id.required' => 'Login ID is required.',
        'password.required' => 'Password is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if ($propertyName === 'user_id') {
            $this->user_idError = '';
        } elseif ($propertyName === 'password') {
            $this->passwordError = '';
        }

        $this->generalError = '';
    }

    public function login()
    {
        $this->resetErrors();

        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->setErrorsFromValidation($e);
            return;
        }

        $user = User::where('email', $this->user_id)
            ->orWhere('user_id', $this->user_id)
            ->first();

        if ($user && Hash::check($this->password, $user->password)) {
            if ($user->type !== 'User') {
                $this->generalError = 'Access denied. Admin users cannot login here. Please use admin login.';
                return;
            }
            Auth::login($user);

            return redirect()->route('web.resorts')->with('navigate');
        }

        $this->generalError = 'Invalid user credentials. Please check your login ID and password.';
    }

    private function resetErrors()
    {
        $this->user_idError = '';
        $this->passwordError = '';
        $this->generalError = '';
    }

    private function setErrorsFromValidation(\Illuminate\Validation\ValidationException $e)
    {
        $errors = $e->errors();

        if (isset($errors['user_id'])) {
            $this->user_idError = $errors['user_id'][0];
        }

        if (isset($errors['password'])) {
            $this->passwordError = $errors['password'][0];
        }
    }

    public function render()
    {
        return view('livewire.web.login')->layout('web.layouts.app');
    }
}
