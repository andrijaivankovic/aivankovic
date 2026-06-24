@extends("layouts.public")

@section("title")
    Update
@endsection

@section("content")
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Izmeni komentar</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mt-3">
            <div class="card-title">
                <h1 class="text-center">
                    Izmenite komentar
                </h1>
            </div>

                <div class="card-body">
                    <form action="{{ route("updateStore",$komentar->id) }}" method="post" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="">Unesite komentar:</label>
                            <input type="text" name="komentar" class="form-control" value="{{ $komentar->komentar }}" id="">
                        </div>

                        <div class="form-group">
                            <label for="">Ocenite kolac:</label>
                            <input type="number" name="ocena" min="1" max="5" value="{{ $komentar->ocena }}" class="form-control" id="">
                        </div>

                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        
                        <div class="row">
                            <div class="col-md-10">
                                <button class="btn btn-primary mt-3">Izmenite komentar</button>
                            </div>

                            <div class="col-md-2">
                                <a href="{{ route("proizvod",$proizvod->id) }}" class="btn btn-secondary mt-3">Odustani od izmene</a>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
    </div>
@endsection