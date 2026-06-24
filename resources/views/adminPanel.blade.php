@extends("layouts.public")

@section("title")
    Admin panel
@endsection

@section("content")
    <div class="container-fluid page-header py-6 wow fadeIn m-0" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Admin panel</h1>
        </div>
    </div>

    <div class="container-fluid  d-flex m-0 flex-wrap justify-content-between p-0">


        <div class="side-bar text-center" style="height: 100vh;width: 20%;border: 1px solid black;background-color:#FDF5EB" >
            <p class="mt-3"><a href="{{ route("preusmeravanje") }}">Glavni Dashboard</a></p>
            <p><a href="{{ route("sviUseri") }}">Lista korisnika</a></p>
            <p><a href="{{ route("listaProizvoda") }}">Lista proizvoda</a></p>
        </div>

        <div class="desni-deo p-1" style="width: 80%;">
                <div class="row  mt-3 justify-content-center mb-2" >
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-title">
                                <h3 class="text-center mt-3">Broj porudzbina:</h3>
                            </div>

                            <div class="card-body text-center">
                                <h1 class="text-info">{{ $porudzbineBroj }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-title">
                                <h3 class="text-center mt-3">Zarada(Revenue):</h3>
                            </div>

                            <div class="card-body text-center">
                                <h1 class="text-success">{{ $ukupnaZarada }}rsd</h1>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-title">
                                <h3 class="text-center mt-3">Broj korisnika:</h3>
                            </div>

                            <div class="card-body text-center">
                                <h1 class="text-warning">{{ $userBroj }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="donji-deo d-flex gap-2">
                <html>
                    <head>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Obični korisnici',  {{ $obicniKorisniciBroj }}],
                                ['Urednici', {{ $AdminiBroj }}],
                                ['Admini',    {{ $EditorBroj }}],
                                ]);

                                var options = {
                                title: 'Pregled registrovanih naloga',
                                is3D: true,
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                chart.draw(data, options);
                            }
                        </script>
                    </head>
                    <body>
                        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                    </body>
                </html>

                <table class=" table table-striped " >
                    <thead>
                        <tr>
                            <th>Narudzbina</th>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Proizvod</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($porudzbine as $index => $p)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $p->ime }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->katalog->ime }}</td>
                                <td><a href="{{ route("admin.editPorudzbina",$p->id) }}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{ route("admin.obrisiPorudzbinu",$p->id) }}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection