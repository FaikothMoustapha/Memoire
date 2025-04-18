<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->role_id == '1')
             {
                   
                 // dd('Admin');
                
                 return redirect('admin/dashboard');
             }
             else if (Auth::user()->role_id == '2')
                 {
                     return redirect('responsable/dashboard');
                 }
        }
        
            return view('auth.login');
    }




    public function authlogin(Request $request)
    {
        // dd($request->all());
        // dd(Hash::make('1234567'));

        $remember = !empty($request->item_checkbox)? true:false;
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password],$remember ))
            {
                if (Auth::user()->role_id == '1')
                {
                    
                    // dd('Admin');
                
                    return redirect('admin/dashboard');
                }
                else if (Auth::user()->role_id == '2')
                {
                    return redirect('responsable/dashboard');
                }
               

            // dd(Auth::user()->role_id);
                
            }
        else
            {
                return redirect()->back()->with('error', 'Addresse mail ou mot de passe invalide');
            }

    }
    
    public function logout()
       {
            Auth::logout();
            return redirect('/');
       }

   
    public function forgot()
        {
            return view('auth.forgot');
        }
    
    public function requestemail(Request $request)
    {
        $user = User::getemail($request->email);
            if (!empty($user) && (!empty($user->email)))  
                {
                    $user->remember_token = Str::random(30);
                    $user->save();
                    Mail::to($user->email)->send(new ForgotPasswordMail($user));
                    return redirect()->back()->with('success', 'Un email de réinitialisation a été envoyé à votre adresse. Merci de suivre les instructions indiquées. '); 
                }
            else
                {
                    return redirect()->back()->with('error', 'Email introuvable'); 

                }
    }

    public function showResetForm($remember_token)
        {
            $user = User::gettoken($remember_token);
            if (!empty($user)) 
                {
                    return view('auth.reset', ['user'=> $user , 'token'=> $remember_token]);
                }
            else
                {
                    alert(404);
                }
        }

    public function resetPassword($token, Request $request)
        {
            
            if ($request->password == $request->confirm_password) 
                {
                    $user= User::gettoken($token);
                    // dd($request->all());
                    $user->password = Hash::make($request->password) ;
                    $user->remember_token = Str::random(30);
                    $user->save();
                    return redirect(url(''))->with('success', 'Votre mot de passe à été bien réinitialiser');
                }
            
            else
                {
                    return redirect()->back()->with('error', 'Email introuvable'); 

                }
        }

        

    
}