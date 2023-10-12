@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Kategoriler")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url("/categories/create"))
@section("btn_add_label","Yeni Kategori Ekle")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">Kategori Adı</th>
            <th scope="col">Kısa Adı</th>
            <th scope="col">Durumu</th>
            <th scope="col">Kategori işlemleri</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories)> 0)
            @foreach($categories as $category)
                <tr id="{{$category->category_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        @if($category->is_active == 1 )
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/categories/$category->category_id/edit")}}">
                                    <span>Güncelle</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <form action="{{url("/categories/$category->category_id")}}" method="POST">
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
            <td class="text-center" colspan="5" >Şu an sistemde kategori bulunmamaktadır.</td>
        @endif
        </tbody>
    </table>
@endsection

