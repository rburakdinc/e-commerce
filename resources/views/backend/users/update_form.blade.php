@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Kullanıcı Güncelleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/dashboard/$user->user_id")}}" method="POST" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz." field="name" value="{{$user->name}}"/>
            </div>
            <div class="col-lg-6">
                <x-input label="E-Mail" placeholder="E-Mail Giriniz." field="email" type="email" value="{{$user->email}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-checkbox label="Yetkili Kullanıcı"  field="is_admin" checked="{{$user->is_admin}}"/>

            </div>
            <div class="col-lg-6">
                <x-checkbox label="Aktif Kullanıcı"  field="is_active" checked="{{$user->is_active}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>
@endsection
