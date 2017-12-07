<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Exceptions\PermissionException;
use Illuminate\Http\Request;
use App\Exceptions\AuthenticationException;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request){
        
        
                try {
                    // Receive request data
                    $data = $request->only('email', 'password');
        
                    // Authenticate
                    if(!Auth::attempt($data, $request->has('remember'))){
                        throw new AuthenticationException('Incorrect password or Email. Please, try again.');
                    }
        
                    // Check for permissions
                    $user = Auth::user();
        
        //            if ( $user->hasRole('admin') ) {
                        return view('message.success', [
                            'message' => trans('Going to dashboard'),
                            'redirect' => '/'
                        ]);
        //            }
        
        //            Auth::logout();
        //            throw new PermissionException('You don\'t have enough permissions to sign into dashboard');
                }
        
                catch(AuthenticationException $e){
                    return view('message.error', [
                        'errors' => [
                            $e->getMessage()
                        ],
                    ]);
                }
        
                catch(PermissionException $e){
                    return view('message.error', [
                        'errors' => [
                            $e->getMessage()
                        ],
                    ]);
                }
        
                catch(Exception $e){
                    return view('message.error', [
                        'errors' => [
                            (env('APP_DEBUG')) ? $e->getMessage() : trans('Internal Server Error')
                        ],
                    ]);
                }
            }
}
