@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h3 class="card-header"><b>Author list</b></h3>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-3 mt-3">
                            @foreach ($authors as $author)
                                <a class="btn btn-primary mb-3" href="/author/{{ $author["id"] }} role="button">{{ $author["name"] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
