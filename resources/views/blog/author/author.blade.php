@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <h3 class="card-header text-center">Author : <b>{{ $author }}</b></h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($articles as $post)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <h5 class="card-header text-center"><b>{{ $post["title"] }}</b></h5>
                    <div class="d-flex justify-content-center m-3" style="width:100%; height: auto;"><img class="w-75" src="@if ($post["image"]) {{ asset('storage/posts/'.$post["image"]) }} @else https://picsum.photos/300/200 @endif" alt=""></div>
                    <div class="card-body">
                        <p class="text-muted"><small>By <a href="/author/{{ $post["user"]["id"] }}">{{ $post["user"]["name"] }}</a> in <a href="/category/{{ $post['category']['id'] }}">{{ $post["category"]["name"] }}</a></small></p>
                        {{ substr($post["content"],0,144) . " ..." }}
                        <br>
                        <a class="btn btn-primary mt-4" href="/articles/{{ $post["id"] }}" role="button">Read More</a>
                        {{-- <a href="/articles/{{ $post["id"] }}">Read More</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
