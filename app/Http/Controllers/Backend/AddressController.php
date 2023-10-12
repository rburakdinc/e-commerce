<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AddressController extends Controller
{
    public function __construct()
    {
        $this->returnUrl = "/dashboard/{user}/addresses";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(User $user):View
    {

        $addresses = Address::all();
        return view("backend.addresses.index",["addresses" => $addresses, "users" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(User $user)
    {
        return view("backend.addresses.insert_form", ["user" => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user,AddressRequest $request)
    {
        $address = new Address();
        $data = $this->prepare($request,$address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user, Address $address):View
    {
        return view("backend.addresses.update_form",["user"=>$user, "address"=>$address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AddressRequest $request, User $user, Address $address)
    {
        $data = $this->prepare($request, $address->getFillable());
        $address->fill($data);
        $address->save();

        $this->editReturnUrl($user->user_id);

        return Redirect::to($this->returnUrl);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user,Address $address)
    {

        $address = Address::find($address->address_id);
        $address->delete();
        return Redirect::to("/dashboard/$user->user_id/addresses");
    }

    private function editReturnUrl($id)
    {
        $this->returnUrl = "/dashboard/$id/addresses";
    }
}
