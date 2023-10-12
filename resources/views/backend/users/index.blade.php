@extends("backend.shared.backend_theme")
@section("title","Yönetim Paneli")
@section("subtitle","Kullanıcılar")
@section("btn_back_url",url("/"))
@section("btn_back_label","Sayfaya Dön")
@section("btn_add_url",url("/dashboard/create"))
@section("btn_add_label","Yeni Kullanıcı Ekle")
@section("content")
    <table class="table table-striped table-sm">

        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">ID</th>
            <th scope="col">Ad Soyad</th>
            <th scope="col">Email</th>
            <th scope="col">Aktiflik Durumu</th>
            <th scope="col">Adminlik Durumu</th>
            <th scope="col">Kullanıcı işlemleri</th>
        </tr>
        </thead>
        <tbody>
        @if(count($users)> 0)
            @foreach($users as $user)
                <tr id="user_id">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_active == 1 )
                            <span class="badge text-bg-success">Aktif</span>
                        @else
                            <span class="badge text-bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_admin == 1 )
                            <span class="badge text-bg-secondary">Admin</span>
                        @else
                            <span class="badge text-bg-primary">Admin Değil</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{url("/dashboard/$user->user_id/edit")}}">
                                    <span>Güncelle</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <form action="{{url("/dashboard/$user->user_id")}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn" type="submit">
                                        Sil
                                    </button>
                                </form>
                            </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-black" href="{{url("/dashboard/$user->user_id/addresses")}}">
                                            <span>Adres Ekle</span>
                                        </a>
                                    </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <td class="text-center" colspan="7" >Şu an sistemde adres bulunmamaktadır.</td>
        @endif
        </tbody>
    </table>
@endsection
