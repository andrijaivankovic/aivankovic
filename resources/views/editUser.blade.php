@extends("layouts.public")

@section("title")
    Izmeni Usera
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Edituj Usera</h1>
        </div>
    </div>

    <div class="container">

        <div class="card shadow mt-3">
            <div class="card-title">
                <h1 class="text-center">Edituj Usera - {{ $user->name }}</h1>
            </div>

            <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Unesite ime korisnika:</label>
                        <input type="text"  name="name" value="{{ $user->name }}" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Unesite email korisnika:</label>
                        <input type="email" name="email" class="form-control"  value="{{ $user->email }}" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Unesite role korisnika:</label>
                        <select name="role" class="form-control" id="">
                            @foreach ($rolovi as $r)
                                <option value="{{ $r }}" @selected($user->role == $r)>{{ $r }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Unesite password korisnika:</label>
                        <input type="password" name="password" class="form-control"  id="">
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-primary mt-3">Edituj korisnika</button>
                        </div>

                        <div class="col-md-2">
                            <a href="{{ route("sviUseri") }}" class="btn btn-secondary mt-3">Odustani od editovanja</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    

@endsection