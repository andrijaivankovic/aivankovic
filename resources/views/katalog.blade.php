@extends("layouts.public")

@section("title")
    Katalog
@endsection

@section("content")
    
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Katalog</h1>
        </div>
    </div>
    


    <div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">Ceo Katalog</p>
                <h1 class="display-6 mb-4">Pogledajte sve vrste nasih Proizvoda</h1>
            </div>
            <div class="row g-4">
                @foreach ($proizvodi as $p)
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
                                    <a class="btn btn-lg-square btn-outline-light rounded-circle" href="{{ route("proizvod",$p->id) }}"><i class="fa fa-eye text-primary"></i></a>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection