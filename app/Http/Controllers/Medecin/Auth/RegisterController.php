<?php

namespace App\Http\Controllers\Medecin\Auth;

use App\Medecin;
use App\Agence;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new admins as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/medecin';

    // static function verifAdmin()
    //  {
    //     return $this->middleware('auth:admin');
    //  }

    //  static function verifRole()
    //  {
    //    return $this->middleware('role:super');
    //  }

    //  static function verifAgence()
    //  {
    //     return $this->middleware('agence.auth:agence');
    //  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // if($this->middleware('agence.auth:agence') || $this->middleware('auth:admin') && $this->middleware('role:super') ){
        //     $this->middleware('medecin.guest:medecin');
        // }
         $this->middleware('auth:admin');
        $this->middleware('role:super');
        // $this->middleware('agence.auth:agence');
        $this->middleware('medecin.guest:medecin');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:medecins',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\medecin
     */
    protected function create(array $data)
    {

        return Medecin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'agence_id' => $data['agence_id'],
            'status' => $data['status'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $agence = Agence::where('id', $request->agence_id)->first();
        // return $agence;
        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
        Toastr::success($request->name.' a été enregistrer entant qu\'medecin au compte de '.$agence->name, 'Success');
        return redirect()->route('admin.medecins.index')->with('message', $request->name.' a été enregistrer entant que medecin au compte de '.$agence->name);
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $agences = Agence::All();

        return view('medecin.auth.register', compact('agences'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('medecin');
    }

}
