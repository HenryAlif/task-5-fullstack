@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($articles as $post)
            <div class="col-md-3 mb-3">
                <div class="row g-0">
                    <div class="card mb-3" style="width: 18rem;">
                    <img class="img-fluid rounded" src="@if ($post["image"]) {{ asset('storage/posts/'.$post["image"]) }} @else https://picsum.photos/300/200 @endif" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $post["title"] }}</h5>
                        {{ substr($post["content"],0,80) . " ..." }}
                        <p class="text-muted"><small>By <a href="/author/{{ $post["user"]["id"] }}">{{ $post["user"]["name"] }}</a> in <a href="/category/{{ $post['category']['id'] }}">{{ $post["category"]["name"] }}</small></a></p>
                        <br>
                        <a class="btn btn-primary" href="/articles/{{ $post["id"] }}" role="button">Read More</a>
                    </div>
                    </div>

                </div>
                </div>

        @endforeach
    </div>
</div>
@endsection
