@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Yeni Adres Ekleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/dashboard/$user->user_id/addresses/")}}" method="POST" novalidate>
        @csrf
        <input type="hidden" name="user_id" value="{{$user->user_id}}">
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Şehir" placeholder="Şehir Giriniz." field="city"/>
            </div>
            <div class="col-lg-6">
                <x-input label="İlçe" placeholder="İlçe Giriniz." field="district"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
             <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz." field="address"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Posta Kodu" placeholder="Posta Kodunu Giriniz" field="zipcode"/>
            </div>

            <div class="col-lg-6">
                <x-checkbox label="Varsayılan Adres"  field="is_default"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>

@endsection
