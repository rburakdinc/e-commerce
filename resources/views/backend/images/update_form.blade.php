@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Ürün Fotoğrafı Güncelleme Ekranı")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url()->previous())
@section("btn_add_label","Geri Dön")
@section("content")
    <form action="{{url("/products/$product->product_id/images/$image->image_id")}}" method="POST" novalidate enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <input type="hidden" name="image_id" value="{{$image->image_id}}">
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Dosya Yükle" placeholder="" field="image_url" type="file"/>
                <img src="{{asset("/storage/products/$image->image_url")}}" alt="{{$image->alt}}" width="100">
            </div>
            <div class="col-lg-6">
                <x-input label="Açıklama" placeholder="Kısa Açıklama Giriniz" field="alt" value="{{$image->alt}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <x-input label="Sıra No" placeholder="Sıra Numarası Giriniz" field="sequence" value="{{$image->sequence}}"/>
                <br>
                <x-checkbox label="Aktiflik Durumu"  field="is_active" checked="{{$image->is_active == 1}}"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <button type="submit" class="btn btn-outline-info">Kaydet</button>
            </div>
        </div>
    </form>
@endsection

