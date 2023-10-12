@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Yeni Fotoğraf Ekleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/products/$product->product_id/images/")}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Dosya Yükle" placeholder="" field="image_url" type="file"/>
            </div>
            <div class="col-lg-6">
                <x-input label="Açıklama" placeholder="Kısa Açıklama Giriniz" field="alt"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Sıra No" placeholder="Sıra Numarası Giriniz" field="sequence"/>
                <br>
                <x-checkbox label="Aktiflik Durumu"  field="is_active"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>

@endsection
