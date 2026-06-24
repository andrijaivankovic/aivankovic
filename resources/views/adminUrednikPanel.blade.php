@extends("layouts.public")

@section("title")
    Admin-Urednik Panel
@endsection

@section("content")
    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Admin-Urednik panel</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>Spisak svih proizvoda</h1>
            </div>

            <div class="col-md-2">
                <a href="{{ route("urednik.proizvod.create") }}" class="btn btn-secondary">Dodaj Novi Proizvod</a>
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
                    <th>Akcije</th>
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
                        <td><a href="{{ route("urednik.edit.proizvod",$p->id) }}" class="btn btn-info">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
    </div>
@endsection