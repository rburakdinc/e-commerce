<!DOCTYPE html>
<html lang="tr" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HepsiBirArada Yönetim Paneli - @yield("title")</title>
    <link rel="stylesheet" href="{{asset("build/assets/app-f3a4110f.css")}}">
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="sidebar border border-right col-md-2 col-lg-2 p-1 ">
            <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                 aria-labelledby="sidebarMenuLabel">

                <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link align-items-center  active" aria-current="page" href="/dashboard">
                                <p><b>Ana Sayfa</b></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-0" href="/categories">
                                <p><b>Kategoriler</b></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-0" href="/products">
                                <p><b>Ürünler</b></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-0" href="/dashboard">
                                <p><b>Kullanıcılar</b></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-0" href="/sign-out">
                                <p><b>Çıkış Yap</b></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <main class="col-md-8 ms-sm-auto col-lg-10 px-md-5">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield("title")</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="@yield("btn_back_url")"
                           class="btn btn-sm btn-outline-secondary">@yield("btn_back_label")</a>
                    </div>
                    <div class="btn-group me-2">
                        <a href="@yield("btn_add_url")"
                           class="btn btn-sm btn-outline-success">@yield("btn_add_label")</a>
                    </div>
                </div>
            </div>

            <h2>@yield("subtitle")</h2>
            <div class="table">
                @yield("content")

            </div>
        </main>
    </div>
</div>

<script type="text/javascript" src="{{asset("build/assets/app-22c83dc2.js")}}"></script>
</body>
</html>

