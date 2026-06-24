@extends("layouts.public")

@section("title")
    Dodaj Proizvod
@endsection

@section("content")

    <div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center pt-5 pb-3">
            <h1 class="display-4 text-white animated slideInDown mb-3">Dodaj Proizvod</h1>
        </div>
    </div>

    <div class="container">

        <div class="card shadow mt-3">
            <div class="card-title">
                <h1 class="text-center">Dodaj Novi Proizvod</h1>
            </div>

            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Unesite ime proizvoda:</label>
                        <input type="text" placeholder="Nutela Kolac" name="ime" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Unesite opis proizvoda:</label>
                        <textarea name="opis" class="form-control" id="opis-editor" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Unesite cenu proizvoda:</label>
                        <input type="number" name="cena" class="form-control" id="" placeholder="499.99" step="0.01" min="0">
                    </div>

                    <div class="form-group">
                        <label for="">Unesite sliku proizvoda:</label>
                        <input type="file" name="slika" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Unesite slug proizvoda:</label>
                        <input type="text" name="slug" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Da li je proizvod na stanju:</label>
                        <select name="na_stanju" id="" class="form-control">
                            <option value="1">Da</option>
                            <option value="0">Ne</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Kojoj kategoriji pripada:</label>
                        <select name="istaknuto_id" class="form-control" id="">
                            @foreach ($kategorije as $k)
                                <option value="{{ $k->id }}">{{ $k->naziv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <button class="btn btn-primary mt-3">Dodaj proizvod</button>
                        </div>

                        <div class="col-md-2">
                            <a href="{{ route("preusmeravanje") }}" class="btn btn-secondary mt-3">Odustani od dodavanja</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#opis-editor').summernote({
                    placeholder: 'Napišite detaljan opis proizvoda...',
                    tabsize: 2,
                    height: 200, 
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', ['underline', 'clear']]],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                });
            });
        </script>
    @endpush

@endsection