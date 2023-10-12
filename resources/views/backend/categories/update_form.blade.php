@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Kategori Güncelleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/categories/$category->category_id")}}" method="POST" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="address_id" value="{{$category->address_id}}">
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz." field="name" value="{{$category->name}}"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Kısa Ad" placeholder="Kısa Ad Giriniz." field="slug" value="{{$category->slug}}"/>
            </div>
        </div>
            <div class="col-lg-6">
                <x-checkbox label="Aktif Kategori"  field="is_active" checked="{{$category->is_active}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

