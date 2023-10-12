<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ödeme Ekranı</title>

    <link rel="stylesheet" href="{{asset("build/assets/app-f3a4110f.css")}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-4 offset-4">
            <main class="mt-5">
                <form method="POST" action="{{url("/buy")}}">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Kredi Kartı Bilgileri</h1>

                    <div class="form-group mt-2">
                        <x-input label="Ad Soyad" placeholder="Kart üzerindeki adı ve soyadı giriniz." field="name"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Kart No" placeholder="Kart numaranızı giriniz" field="card_no"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Son Kullanım Ay" placeholder="Son kullanım ayını giriniz" field="expire_month"
                                 type="number"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Son Kullanım Yılı" placeholder="Son kullanım yılını giriniz" field="expire_year"
                                 type="number"/>
                    </div>

                    <div class="form-group mt-2">
                        <x-input label="Cvc" placeholder="Cvc kodunu giriniz" field="cvc" type="number"/>
                    </div>

                    <button class="w-100 btn btn-lg btn-success mt-4" type="submit">Satın Al</button>
                </form>
            </main>
        </div>
    </div>
</div>
</body>
</html>
