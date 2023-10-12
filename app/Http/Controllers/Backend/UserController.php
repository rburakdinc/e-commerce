<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;



class UserController extends Controller
{

    public function __construct()
    {
        $this->returnUrl = "/dashboard";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("backend.users.index",["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("backend.users.insert_form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->password = Hash::make($user->password);
        $user->save();

        return Redirect::to("$this->returnUrl");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("backend.users.update_form",["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find("$id");
        $data = $this->prepare($request,$user->getFillable());
        $user->fill($data);
        $user->is_admin=array_key_exists("is_admin",$data)? $data["is_admin"] : 0;
        $user->is_active=array_key_exists("is_active",$data)? $data["is_active"] : 0;

        $user->save();

        return Redirect::to("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return Redirect::to("$this->returnUrl");

    }
}
