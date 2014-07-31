<?php

class AdminController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('auth', ['except' => ['showLoginForm', 'processLogin']]);
    }

    public function index()
    {
        return Redirect::to('admin/users/' . Auth::user()->id . '/edit');
    }

    public function showLoginForm()
    {
        return View::make('admin.login');
    }

    public function processLogin()
    {
        $input = Input::all();

        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ], false, false);

        if ($attempt) {

            if (Auth::getLastAttempted()->is_admin) {

                Auth::login(Auth::getLastAttempted(), true);

                return Redirect::intended('/admin')->with('success', 'Welcome, you have successfully logged in!');
            }
        }

        return Redirect::back()->withInput()->with('login_failed', true);
    }

    public function processLogout()
    {
        Auth::logout();

        return Redirect::to('/');
    }
}
