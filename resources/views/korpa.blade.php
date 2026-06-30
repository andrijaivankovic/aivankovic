@extends("layouts.public")

@section("title")
    Korpa
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Korpa</h1>
        </div>
    </div>

    <div class="container">

        @if (count($proizvodi) == 0)
            <h5 class="text-center">Vasa korpa je prazna!</h5>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Proizvod</th>
                        <th>Cena</th>
                        <th>Akcije</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($proizvodi as $index=> $p)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $p->ime }}</td>
                            <td>{{ $p->cena }}rsd</td>
                            <td>
                                <a href="{{ route("poruci",$p->id) }}" class="btn btn-primary">Poruci</a>
                                <a href="{{ route("izbaci_iz_korpe",$p->id) }}" class="btn btn-danger">Izbaci</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
