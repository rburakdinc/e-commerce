<!DOCTYPE html>
<html lang="tr" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HepsiBirArada @yield("title")</title>
    <link rel="stylesheet" href="{{asset("build/assets/app-f3a4110f.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">HepsiBirArada</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                            </li>
                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="/my-cart">Sepetim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sign-out">Çıkış Yap</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/sign-in">Giriş Yap</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sign-up">Üye ol</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 pt-4">
            <h5>Kategoriler</h5>
            <div class="list-group">
                @if(count($categories) > 0)
                    @foreach($categories as $category)
                        <a href="/category/{{$category->slug}}"
                           class="list-group-item list-group-item-action">{{$category->name}}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-sm-6 pt-4">
            <h5>Ürünler</h5>
            @if(count($products) > 0)
                <div class="card-group">
                    @foreach($products as $product)
                        <div class="card" style="width: 18rem;">
                            <img src="{{asset("/storage/products/".$product->images[0]->image_url)}}"
                                 class="card-img-top"
                                 alt="{{$product->images[0]->alt}}"
                                 width="120"
                            >
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <h6 class="card-title">Fiyat: {{$product->price}}TL</h6>
                                <p class="card-text">{{$product->lead}}</p>
                                <a href="/my-cart/add/{{$product->product_id}}" class="btn btn-primary">Satın Al</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="{{asset("build/assets/app-22c83dc2.js")}}"></script>
</html>
