@extends("layouts.public")

@section("title")
    Update Porudzbina
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Izmeni Porudzbinu</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mt-3">
            <div class="card-title">
                <h1 class="text-center">
                    Izmenite porudzbinu od - {{ $porudzbina->ime }}
                </h1>
            </div>

                <div class="card-body">
                    <form action="" method="post" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="">Unesite ime:</label>
                            <input type="text" name="ime" class="form-control" value="{{ $porudzbina->ime }}" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Unesite email:</label>
                            <input type="email" name="email"  value="{{ $porudzbina->email }}" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Odaberite proizvod:</label>
                            <select name="katalog_id" class="form-control"  id="">
                                @foreach ($sviProizvodi as $p)
                                    <option value="{{ $p["id"] }}" @selected($porudzbina->katalog_id == $p->id)>{{ $p->ime }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Odaberite usera:</label>
                            <select name="user_id" class="form-control"  id="">
                                @foreach ($sviUseri as $u)
                                    <option value="{{ $u->id }}" @selected($porudzbina->user_id == $u->id)>{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <button class="btn btn-primary mt-3">Izmenite porudzbinu</button>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route("preusmeravanje") }}" class="btn btn-secondary mt-3">Odustani od editovanja</a>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
    </div>
@endsection