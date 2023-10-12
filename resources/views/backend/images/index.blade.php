@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Ürün Fotoğrafları")
@section("btn_back_url",url()->previous())
@section("btn_back_label","Geri Dön")
@section("btn_add_url",url("/products/$product->product_id/images/create"))
@section("btn_add_label","$product->name İçin Yeni Fotoğraf Ekle ")
@section("content")
    <table class="table table-striped table-sm">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fotoğraf</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durum</th>
            <th scope="col">Ürün</th>
            <th scope="col">Fotoğraf İşlemleri</th>

        </tr>
        </thead>
        <tbody>
        @if($product->images->count() > 0)
            @foreach($product->images as $image)
                <tr id="{{$image->image_id}}">
                    <td>{{$image->sequence}}</td>
                    <td>{{$image->image_url}}</td>
                    <td>{{$image->alt}}</td>

                    <td>
                        @if($image->is_active == 1 )
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>{{$image->product_id}}</td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="{{url("/products/$product->product_id/images/$image->image_id/edit")}}">
                                    <span>Güncelle</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <form action="{{url("/products/$product->product_id/images/$image->image_id")}}"
                                      method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn" type="submit">
                                        Sil
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="7">Şu an sistemde fotoğraf bulunmamaktadır.</td>
        @endif
        </tbody>
    </table>
@endsection

