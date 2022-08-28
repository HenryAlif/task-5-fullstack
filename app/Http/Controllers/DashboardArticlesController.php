<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'articles' => Articles::where('user_id', auth()->user()->id)->get()->toarray()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.articles.create', [
            'id' => Auth::id(),
            'categories' => Category::all()->toarray()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
            'category_id'  => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('articles', $imageName);

        //create post
        $articles = Articles::create([
            'image'     => $imageName,
            'title'     => $request->title,
            'content'   => $request->content,
            'user_id'   => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        return redirect('/dashboard/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        return view('dashboard.articles.view', [
            'articles' => $articles->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        Articles::find($id)->update($request->all());
        return view('dashboard.articles.edit');
        // return redirect()->back()->with("status", "Success Edit !");
        // return view('dashboard.articles.edit', [
        //     'articles' => $articles,
        //     'id' => Auth::id(),
        //     'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {

            $validator = Validator::make($request->all(), [
                'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title'     => 'required',
                'content'   => 'required',
                'category_id'  => 'required',
            ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        if ($request->hasFile('image')) {
            //upload image
            $image = $request->file('image');
            $imagename = $image->hashName();
            $image->storeAs('public/articles', $imagename);

            //delete old image
            Storage::delete('public/articles/'.$articles->old_image);

            //update posts with new image
            Articles::where('id', $articles->id)->update([
                'image'     => $imagename,
                'title'     => $request->title,
                'content'   => $request->content,
            ]);

        } else {
            //update posts without image
            Articles::where('id', $articles->id)->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'category_id' => $request->category_id
            ]);
        }

        return redirect('/dashboard/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {

        //delete image
        Storage::delete('public/articles/'.$articles->image);

        //delete article
        $articles->delete();

        //return response
        return redirect('/dashboard/articles');
    }
}