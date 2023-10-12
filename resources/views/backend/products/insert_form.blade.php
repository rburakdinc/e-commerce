@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Yeni Ürün Ekleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/products")}}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz." field="name"/>
            </div>
            <div class="col-lg-6">
                <label for="category_id" class="form-label">Kategori Adı</label>
                <select class="form-control" name="category_id" id="category_id" >
                    <option value="-1">
                        Kategori Seçiniz
                    </option>
                    @foreach($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6">
                <x-input label="Ürün Fiyatı" placeholder="Fiyat Giriniz." field="price"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Ürün Eski Fiyat" placeholder="Eski Fiyat Giriniz." field="old_price"/>
            </div>
            <div class="col-lg-12">
                <x-input label="Kısa Açıklama" placeholder="Kısa Açıklama Giriniz." field="lead"/>
            </div>
            <div class="col-lg-12">
                <x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama Giriniz." field="description"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Kısa Adı" placeholder="Kısa Ad Giriniz." field="slug"/>
                <br>
                <x-checkbox label="Aktif Ürün"  field="is_active"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>

@endsection

