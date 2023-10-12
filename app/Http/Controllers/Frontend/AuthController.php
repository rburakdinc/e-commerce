<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function signInForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("frontend.auth.signin_form");
    }

    public function signIn(SignInRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $credentials = $request->only(["email", "password"]);
        $rememberMe = $request->get("remember-me", false);

        if (Auth::attempt($credentials,$rememberMe)) {
            return redirect()->route('home.index');

        } else {
            return redirect()->back()->withErrors(
                [
                    "email" => "Lütfen e-mailinizi kontrol ediniz.",
                    "password" => "Lütfen şifrenizi kontrol ediniz.",
                ]);
        }
    }

    public function signUpForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("frontend.auth.signup_form");
    }

    public function signUp(SignUpRequest $request): \Illuminate\Http\RedirectResponse
    {
    $user = new User();
    $data = $this->prepare($request,$user->getFillable());
    $data["is_active"] = true;
    $user->fill($data);
    $user->save();

    return Redirect::to("/sign-in");
    }

    public function signOut(){
        Auth::logout();
        return redirect("/");
    }
}
