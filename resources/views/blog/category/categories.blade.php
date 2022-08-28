@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md10">
            <div class="card">
                <h3 class="card-header"><b>Category list</b></h3>
                <div class="card-body">
                    @foreach ($categories as $category)
                    <ul class="list-group mb-2">
                        <li class="list-group-item list-group-item-light shadow">
                            <a class="btn btn-light" href="/category/{{ $category["id"] }}" role="button">
                                {{ $loop->iteration}}. {{ $category["name"] }}</a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
