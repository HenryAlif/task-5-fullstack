@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <h3 class="card-header text-center">Category : <b>{{ $category }}</b></h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($articles as $post)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <h4 class="card-header text-center" ><b>{{ $post["title"] }}</b></h4>
                    <div class="d-flex justify-content-center m-3" style="width:100%; height: auto;"><img src="@if ($post["image"]) {{ asset('storage/posts/'.$post["image"]) }} @else https://picsum.photos/300/200 @endif" alt=""></div>
                    <div class="card-body">
                        <p class="text-muted">By <a href="/author/{{ $post["user"]["id"] }}">{{ $post["user"]["name"] }}</a> in <a href="/category/{{ $post['category']['id'] }}">{{ $post["category"]["name"] }}</a></p>
                        {{ substr($post["content"],0,100) . " ..." }}
                        <br>
                        <a class="btn btn-primary mt-3" href="/articles/{{ $post["id"] }}" role="button">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
