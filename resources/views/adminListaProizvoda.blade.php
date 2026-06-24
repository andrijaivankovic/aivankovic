@extends("layouts.public")

@section("title")
    Admin panel
@endsection

@section("content")
    <div class="container-fluid page-header py-6 wow fadeIn m-0" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Admin panel - Lista Proizvoda</h1>
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
                    <h1>Spisak svih proizvoda</h1>
                </div>

                <div class="col-md-2">
                    <a href="{{ route("admin.proizvod.create") }}" class="btn btn-secondary">Dodaj Novi Proizvod</a>
                </div>
            </div>

            <table class="table table-striped" id="tabela-proizvoda">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ime</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Slug</th>
                        <th>Na Stanju</th>
                        <th>Kategorija</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($proizvodi as $index=> $p)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $p->ime }}</td>
                            <td>{{ substr($p->opis,0,10) }}...</td>
                            <td>{{ $p->cena }}</td>
                            <td>{{ $p->slug }}</td>
                            @if ($p->na_stanju == true)
                                <td>Da</td>
                            @else
                                <td>Ne</td>
                            @endif
                            <td>{{ $p["istaknuto"]->naziv }}</td>
                            <td><a href="{{ route("admin.edit.proizvod",$p->id) }}" class="btn btn-info">Update</a></td>
                            <td>
                                <form action="{{ route("obrisiProizvod",$p->id) }}" method="post">
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