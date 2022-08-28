@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header text-center"><b>{{ $articles["title"] }}</b></h3>
                <div class="d-flex justify-content-center my-3 "><img class="w-300" src="@if ($articles["image"]) {{ asset('storage/posts/'.$articles["image"]) }} @else https://picsum.photos/300/200 @endif"  alt=""></div>
                <div class="card-body m-5">
                    <p class="text-muted">By <a href="/author/{{ $articles["user"]["id"] }}">{{ $articles["user"]["name"] }}</a> in <a href="/category/{{ $articles['category']['id'] }}">{{ $articles["category"]["name"] }}</a></p>
                    {{ $articles["content"] }}
                    <br>
                    <a class="btn btn-primary mt-4" href="/home" role="button">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
