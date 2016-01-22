<?php

namespace Facilinfo\Blog\App\Http\Controllers\Auth;

use App\User;
use Validator;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Lang;


use Illuminate\Contracts\Mail\Mailer;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->mailer = $mailer;
    }

    public function loginUsername()
    {
        return 'name';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = ['name.required' => 'Le champ Pseudo est obligatoire.'];

        return Validator::make($data, [
            'name' => 'required|max:255|alpha_num|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ], $messages = ['name.required' => 'Le champ Pseudo est obligatoire.']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $token = str_random(60);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'confirmation_token' => $token,
            'password' => bcrypt($data['password'])
        ]);

        $this->mailer->send(['blog::blog.emails.html-register', 'blog::blog.emails.text-register'], compact('token', 'user'), function ($message) use ($user) {
            $message->to($user->email)->subject('Confirmation de création de compte');
        });
        $user->attachRole(config('blog.default-role-id'));
        return $user;
    }

    public function getLogin(){
        return view('blog::auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 'password' => 'required',
        ],
            $messages = ['name.required' => 'Le champ Pseudo est obligatoire.']
        );

        $user = DB::table('users')->where('name', '=', $request->name)->first();

        if ($user) {

            if($user->confirmed==1){
                // If the class is using the ThrottlesLogins trait, we can automatically throttle
                // the login attempts for this application. We'll key this by the username and
                // the IP address of the client making these requests into this application.
                $throttles = $this->isUsingThrottlesLoginsTrait();

                if ($throttles && $this->hasTooManyLoginAttempts($request)) {
                    return $this->sendLockoutResponse($request);
                }

                $credentials = $this->getCredentials($request);


                if (Auth::attempt($credentials, $request->has('remember')) != 'unconfirmed') {
                    if (Auth::attempt($credentials, $request->has('remember'))) {

                        return $this->handleUserWasAuthenticated($request, $throttles);
                    }
                } else {

                    return redirect($this->redirectTo)
                        ->withInput($request->only($this->loginUsername(), 'remember'))
                        ->withProblem([
                            $this->loginUsername() => $this->getFailedConfirmedMessage(),
                        ]);

                }


                // If the login attempt was unsuccessful we will increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                if ($throttles) {
                    $this->incrementLoginAttempts($request);
                }

                return redirect()->back()
                    ->withInput($request->only($this->loginUsername(), 'remember'))
                    ->withProblem([
                        $this->loginUsername() => $this->getFailedLoginMessage(),
                    ]);
            }
            else {
                return redirect()->back()
                    ->withInput($request->only($this->loginUsername(), 'remember'))
                    ->withProblem(trans('blog::auth.failedconfirm'));
            }

        } else {
            return redirect()->back()
                ->withInput($request->only($this->loginUsername(), 'remember'))
                ->withProblem(trans('blog::auth.failed'));
        }


    }

    protected function getFailedConfirmedMessage()
    {
        return trans('blog::auth.failedconfirm')
            ? trans('blog::auth.failedconfirm')
            : 'Your account hasn\'t been confirmed.';
    }

    public function getRegister(){
        return view('blog::auth.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

       $this->create($request->all());

        return redirect($this->redirectPath());
    }

    public function getConfirm($user_id, $token){


        $user = User::findOrFail($user_id);

        if($user->confirmation_token==$token){
            $user->confirmation_token=null;
            $user->confirmed=true;
            $user->save();
        } else {
            abort(500);
        }
        //Auth::attempt(['name' => $user->name, 'password' => $user->password]);
        Auth::login($user);
        return redirect('/home')->with('success', 'Votre compte a bien été confirmé.');

    }

}