@extends('dashboard/layouts.main')

@section('container')

<div class="col-lg-10 mt-3">
    <h1 class="h2">Welcome Back! {{ Auth::user()->name }}</h1> <hr>
    <h5 class="mt-4">Post List</h5>
    <a href="/dashboard/articles/create"><div class="btn btn-primary mb-5">Create New</div></a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $post)
            <tr>
                <td scope="col">{{ $loop->iteration }}</td>
                <td scope="col">{{ $post["title"] }}</td>
                <td scope="col">{{ $post["category"]["name"] }}</td>
                <td scope="col">
                    <a href="/articles/{{ $post["id"] }}">View</a>
                    <a href="/dashboard/articles/{{ $post["id"] }}/edit">Edit</a>
                    <a href="/dashboard/articles/{{ $post["id"] }}/delete">delete</a>
                    {{-- <form action="/articles/{{ $post["id"] }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border-0 bg-transparent text-primary"><u> Delete </u></button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
