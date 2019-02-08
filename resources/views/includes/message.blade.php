@if ($errors->hasBag())
    <div class="row my-5 justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@if (Session::has('message'))
    <div class="row my-5 justify-content-center">
        <div class="col-md-5">
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
@endif