@extends('dashboard/layouts.main')

@section('container')

<section class="section container">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Details</h5>

                    <!-- General Form Elements -->
                    <form action="{{'/dashboard/articles/'.$articles->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <input type="hidden" value="{{$id}}" name="user_id">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " name="title" required="" value="{{ $articles->title }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea class="form-control " style="height: 100px" name="content" required="">{{ $articles->content}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Image URL</label>
                            <div class="col-sm-10">
                               @if($articles["image"])
                                <img src="{{ asset('storage/posts/'.$articles['image']) }}" alt="" class="w-50 mb-3">
                                <input disabled hidden type="img" class="form-control " name="old_image" required="" value="{{ $articles['image']}}">
                                @endif
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-select " aria-label="Default select example" name="category_id" required="">
                                    <option disabled="" value="">Choose...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $loop->iteration }}" {{ $category->id === $articles->category_id ? 'selected' : ''}}>{{ $category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form><!-- End General Form Elements -->
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
