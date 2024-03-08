<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Mail\AccountActivationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AuthController extends Controller
{
    public function authenticate()
    {

        $validated = request()->validate([
            'email'=>'email|required',
            'password' => 'required',
        ]);

        if(auth()->attempt($validated)){
            $token = app('auth.password.broker')->createToken(auth()->user());
            if(auth()->user()->must_reset){
                $first_name= auth()->user()->first_name;
                $email = auth()->user()->email;
                //email reset link and logout the user
                Mail::to(auth()->user()->email)->send(new AccountActivationEmail($token, $first_name));
                Auth::logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();
                return redirect()->back()->with('message',"An account activation link was emailed to $email ");
            }
            else{
                //request()->session()->regenerate(); 
                return redirect()->intended('dashboard'); 
            }
        }
        else{

            return redirect()->back()->withInput(request()->only('email', 'remember_token'))->withErrors('errors',"Login credentials for email: {request()->email} are not matching our records");
        }
    }

    public function inactive()
    {

        return view('/auth.inactive', compact('email'));
    }

    public function activateAccount()
    {
        $token = request()->token;
        return view('auth.activate', compact('token'));
    }

    public function update()
    {
        //dd(request()->all());
        $validated = request()->validate([
            'email'=>'email|required',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);
        //$token = collect(request()->all())->keys()[0];
        $token = request()->token;
        $mail = request()->email;
        $user =DB::table('password_reset_tokens')->where('email', $mail)->first();

        if(!is_null($user)){
           // return 'token present';
            $hash = $user->token;
        }
        else{
           // 'token absent';
            $hash=Hash::make('aa');
        }
        if(Hash::check($token, $hash))
        {
           // return 'ndozvo';
            $user = User::where('email',request()->email)->first();
            $user->update([
                'password'=>Hash::make($validated['password']),
                'must_reset'=>false,
            ]);

            $delete_token = DB::table('password_reset_tokens')->where('email', $mail)->delete();
            return redirect()->route('login')->with('message',"Your Account was successfully activated, you now log in with new credentials. ");

        }
        else{//invalid token
            //return 'mahwani';
            return back()->withInput(request()->only('email', 'remember_token'))->withErrors('errors',"Login credentials for email: {request()->email} are not matching our records");
        }


    }

    public function dashboard()
    {
        //auth()->logout();
        return view('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();        
        return redirect()->route('login')->with('message',"You were succefully logged out");
    }



}
