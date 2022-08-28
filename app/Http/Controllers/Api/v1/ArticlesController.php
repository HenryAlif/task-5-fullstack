<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Http\Resources\Articles as ArticlesResource;

class ArticlesController extends Controller
{
    public function index(){
        $articles = Articles::paginate(5);
        return response()->json(['posts' => ArticlesResource::collection($articles)], 200);
    }

    public function create()
    {

    }

    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Articles::create($validateData);
        return response()->json(['msg' => 'Created Successfully'], 200);
    }

    public function show($id){
        $articles = Articles::find($id);

        if(is_null($articles)){
            return response()->json(['error' => 'Product Not Found'], 404);
        }

        return response()->json(['post' => new ArticlesResource($articles)], 200);
    }

    public function edit(){

    }

    public function update(Request $request, Articles $articles)
    {
        $rules = [
            'title'         => 'required|max:255',
            'content'       => 'required',
            'category_id'   => 'required'
        ];

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;

        Articles::where('id', $articles->id)->update($validateData);

        return response()->json(['msg' => 'Updated Successfully'], 200);
    }

    public function destroy(ArticlesResource $articles)
    {
        Articles::destroy($articles->id);

        return response()->json(['msg' => 'Deleted Successfully'], 200);
    }



}