<?php

namespace App\Http\Controllers\Auth;

use App\Events\AssignUserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Foundation\Auth\RegistersUsers;

class RegisteredUserController extends Controller
{
    // use RegistersUsers;
    /**
     * Display the registration view.
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create()
    {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->createUSer($request->all());

        event(new AssignUserRole($user));

        return redirect($this->redirectPath());
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function redirectPath()
    {
        return $this->redirectTo;
    }
}
