<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/teacher/dashboard';


    /**
     * Shows the admin login form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (auth()->guard('Teacher')->check()) {
            $teacher = auth('Teacher')->user();
            return view('admin.dashboard.index',['name'=>$teacher->fName]);

        }

        return view('auth.teacher.login');
    }

    /**
     * Login the employee
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $details = $request->only('email', 'password');
        if (auth()->guard('Teacher')->attempt($details)) {
//            return $this->sendLoginResponse($request);
            $teacher = auth('teacher')->user();
            return view('admin.dashboard.index',['name'=>$teacher->fName]);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function register(){
        return "baadan fln dasti";
    }

    public function logout(Request $request)
    {
        $this->guard('Teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/teacher/login');
    }
}
