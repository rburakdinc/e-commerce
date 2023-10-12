@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Ürünler")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url("/products/create"))
@section("btn_add_label","Yeni Ürün Ekle")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Kategori Adı</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Eski Fiyat</th>
            <th scope="col">Aktiflik Durumu</th>
            <th scope="col">Ürün işlemleri</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products)> 0)
            @foreach($products as $product)
                <tr id="{{$product->product_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>
                        @if($product->is_active == 1 )
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/products/$product->product_id/edit")}}">
                                    <span>Güncelle</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <form action="{{url("/products/$product->product_id")}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn" type="submit">
                                        Sil
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/products/$product->product_id/images")}}">
                                    <span>Fotoğraf Ekle</span>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="7" >Şu an sistemde ürün bulunmamaktadır.</td>
        @endif
        </tbody>
    </table>
@endsection

