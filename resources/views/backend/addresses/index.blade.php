@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Adresler")
@section("btn_back_url",url()->previous())
@section("btn_back_label","Geri Dön")
@section("btn_add_url",url("/dashboard/$users->user_id/addresses/create"))
@section("btn_add_label","$users->name İçin Yeni Adres Ekle ")
@section("content")
    <table class="table table-striped table-sm">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Şehir</th>
            <th scope="col">İlçe</th>
            <th scope="col">Posta Kodu</th>
            <th scope="col">Açık Adres</th>
            <th scope="col">Adres Durumu</th>
            <th scope="col">Kullanıcı ID</th>
            <th scope="col">Adres işlemleri</th>

        </tr>
        </thead>
        <tbody>
        @if($addresses->count() > 0)
            @foreach($addresses as $address)
                    <tr id="{{$address->address_id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$address->city}}</td>
                        <td>{{$address->district}}</td>
                        <td>{{$address->zipcode}}</td>
                        <td>{{$address->address}}</td>

                        <td>
                            @if($address->is_default == 1 )
                                <span class="badge text-bg-success">Varsayılan Adres</span>
                            @else
                                <span class="badge text-bg-danger">Başka Adres</span>
                            @endif
                        </td>
                        <td>{{$address->user_id}}</td>
                        <td>
                            <ul class="nav float-start">
                                <li class="nav-item">
                                    <a class="nav-link text-black"
                                       href="{{url("/dashboard/$users->user_id/addresses/$address->address_id/edit")}}">
                                        <span>Güncelle</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <form action="{{url("/dashboard/$users->user_id/addresses/$address->address_id")}}"
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
                    <td class="text-center" colspan="7">Şu an sistemde adres bulunmamaktadır.</td>
                @endif
        </tbody>
    </table>
@endsection
