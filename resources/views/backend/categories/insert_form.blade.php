@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Yeni Kategori Ekleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/categories")}}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Kategori Adı" placeholder="Kategori Giriniz." field="name"/>
                <br>
                <x-checkbox label="Aktif Kategori"  field="is_active"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Kategori Kısa Adı" placeholder="Kısa Ad Giriniz." field="slug"/>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>

@endsection
