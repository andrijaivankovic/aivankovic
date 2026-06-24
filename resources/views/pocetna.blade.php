@extends("layouts.public")

@section("title")
    Početna
@endsection

@section("content")
    
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    


    
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img src="{{ asset('img/carosel_1.jpg') }}" class="w-100" style="height: 1100px; object-fit: cover;" alt="Kolači 1">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Tamo gde svaka kora priča priču</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Kora&Krem</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Spoj hrskavih kora i najfinijeg krema po domaćoj recepturi.Osetite slatku magiju u svakom zalogaju naše zanatske radionice.</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Pročitaj više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img src="{{ asset('img/carosel_2.jpg') }}" class="w-100" style="height: 1100px; object-fit: cover;" alt="Kolači 1">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Tamo gde svaka kora priča priču</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Kora&Krem</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Spoj hrskavih kora i najfinijeg krema po domaćoj recepturi.Osetite slatku magiju u svakom zalogaju naše zanatske radionice.</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Pročitaj više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img src="{{ asset('img/carosel_3.jpg') }}" class="w-100" style="height: 1100px; object-fit: cover;" alt="Kolači 1">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-8">
                                <p class="text-primary text-uppercase fw-bold mb-2">Tamo gde svaka kora priča priču</p>
                                <h1 class="display-1 text-light mb-4 animated slideInDown">Kora&Krem</h1>
                                <p class="text-light fs-5 mb-4 pb-3">Spoj hrskavih kora i najfinijeg krema po domaćoj recepturi.Osetite slatku magiju u svakom zalogaju naše zanatske radionice.</p>
                                <a href="" class="btn btn-primary rounded-pill py-3 px-5">Pročitaj više</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


   

    
    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">Najbolja Poslastičarnica u Beogradu</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Pozovi nas</p>
                                <p class="fs-1 fw-bold mb-0">+381 63 321 321</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Naši proizvodi</p>
                <h1 class="display-6 mb-4">Premium Kolekcija</h1>
            </div>
            <div class="row g-4">
                @foreach ($premiumKolekcija as $p)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item d-flex flex-column bg-white rounded overflow-hidden h-100">
                            <div class="text-center p-4">
                                <div class="d-inline-block border border-primary rounded-pill px-3 mb-3">{{ $p->cena }}</div>
                                <h3 class="mb-3">{{ $p->ime }}</h3>
                                <span>{{ $p->opis }}</span>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" src="img/{{ $p->slug }}.jpg" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href=""><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    


    
    
@endsection