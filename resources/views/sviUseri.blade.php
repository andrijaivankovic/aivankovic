@extends("layouts.public")

@section("title")
    Admin panel - Lista Korisnika
@endsection

@section("content")
    <div class="container-fluid page-header py-6 wow fadeIn m-0" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Admin panel - Lista Korisnika</h1>
        </div>
    </div>

    <div class="container-fluid  d-flex m-0 flex-wrap justify-content-between p-0">


        <div class="side-bar text-center" style="height: 100vh;width: 20%;border: 1px solid black;background-color:#FDF5EB" >
            <p class="mt-3"><a href="{{ route("preusmeravanje") }}">Glavni Dashboard</a></p>
            <p><a href="{{ route("sviUseri") }}">Lista korisnika</a></p>
            <p><a href="{{ route("listaProizvoda") }}">Lista proizvoda</a></p>
        </div>


        <div class="container mt-3">
            <div class="row">
                <div class="col-md-10">
                    <h1>Spisak svih korisnika</h1>
                </div>

                <div class="col-md-2">
                    <a href="{{ route("dodajUsera") }}" class="btn btn-secondary">Dodaj Novog Korisnika</a>
                </div>
            </div>

            <table class="table table-striped" id="tabela_usera">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($useri as $index=> $u)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->role }}</td>
                            <td><a href="{{ route("editUsera",$u->id) }}" class="btn btn-info">Update</a></td>
                            <td>
                                <form action="{{ route("obrisiUsera",$u->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger">Obrisi</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection