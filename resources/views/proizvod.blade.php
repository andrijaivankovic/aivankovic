@extends("layouts.public")

@section("title")
    {{ $proizvod->ime }}
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">{{ $proizvod->ime }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow">
            <div class="card-title">
                <h1 class="text-center">{{ $proizvod->ime }}</h1>
            </div>
            
            <div class="card-subtitle">

            </div>

            <div class="card-body flex-column justify-content-center ">
                <img src="{{ asset('img/' . $proizvod->slug . '.jpg') }}" style="width: 350px" alt="">
                <p>{{ $proizvod->opis }}</p>
                <p>Kategorija{{ $proizvod["istaknuto"]->naziv }}</p>
                <p class="text-muted">Cena:{{ $proizvod->cena }}rsd</p>

                
                <a href="{{ route("dodaj_u_korpu",$proizvod->id) }}" class="btn btn-primary">Dodaj u korpu</a>
                
            </div>

            
        </div>

        <div class="card shadow mt-4">
                <div class="card-title">
                    <h1 class="text-center">Komentari za {{ $proizvod["ime"] }}</h1>
                </div>

                <div class="card-body ">

                    @if (!auth()->user())
                        <h6 class="text-center">Morate se ulogovati da bi ste videli komentare i da bi ste mogli da komentarisete!</h2>
                    @else
                            @if ($komentari->isEmpty())
                                <h5>Trenutno nemamo komentare za ovaj proizvod! Budite prvi koji ce komentarisati!</h5>
                            @else
                            <ul class="list-group">
                                @foreach ($komentari as $k)
                                    <li class="list-group-item">Komentar:{{ $k->komentar }}  Ocena:{{ $k->ocena }}

                                    @if (auth()->user()->id == $k["user_id"])
                                        <a href="{{ route("update",['id' => $k->id, 'proizvodid' => $proizvod->id]) }}" class="btn btn-info ms-3">Update</a>
                                        <a href="{{ route("obrisi_komentar",$k->id) }}" class="btn btn-danger ">Delete</a>
                                    @endif
                                        

                                @endforeach
                            </ul>
                        @endif

                            <form action="{{ route("komentar",$proizvod->id) }}" method="post" class="mt-5">
                                @csrf
                                <div class="form-group">
                                    <label for="">Unesite komentar:</label>
                                    <input type="text" name="komentar" class="form-control" placeholder="Bas je lep kolac!" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Ocenite kolac:</label>
                                    <input type="number" name="ocena" min="1" max="5" placeholder="1-5" class="form-control" id="">
                                </div>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                <button class="btn btn-primary mt-3">Postavite Komentar</button>
                            </form>
                    @endif

                    
                </div>
            </div>
    </div>
@endsection