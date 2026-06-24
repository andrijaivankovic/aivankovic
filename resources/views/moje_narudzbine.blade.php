@extends("layouts.public")

@section("title")
    Moje narudzbine
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Moje porudzbine</h1>
        </div>
    </div>

    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Proizvod</th>
                    <th>Datum</th>
                    <th>Akcije</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($narudzbine as $index=> $n)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $n["katalog"]->ime }}</td>
                        <td>{{ substr($n["created_at"],0,10) }}</td>
                        <td><a href="{{ route("obrisi",$n->id) }}" class="btn btn-danger">Obrisi</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection