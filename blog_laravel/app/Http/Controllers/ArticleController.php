<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;



class ArticleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create_article(Request $request)
    {

        $bearer = $request->header('authorization');
        if ($bearer != "") {
            $token = explode(" ", $bearer)[1];
            $user = User::where("token", $token)->first();
            if ($user != null) {
                $validator = Validator::make($request->all(), [
                    "title" => "required",
                    "text" => "required",
                    "blog_id" => "required|integer",
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        "error" => $validator->errors()
                    ]);
                } else {
                    $blog_id = 
                    $article = new Articles();
                    $article->title = $request->input('title');
                    $article->text = $request->input('text');
                    $article->blog_id = $request->input('blog_id');
                    $article->save();
                    return response()->json("article created");
                }
            } else {
                return response()->json(["data" => [
                    "message" => "user not found",
                    "status" => $token
                ]]);
            }
        } else {
            return response()->json(["data" => [
                "message" => "Token is empty"
            ]]);
        }
    }
    public function show_article(Request $request){
        $bearer = $request->header('authorization');
        if ($bearer != "") {
            $token = explode(" ", $bearer)[1];
            $user = User::where("token", $token)->first();
            $blog = Blogs::where("id", $user -> id)->first();
            if ($user != null) {
                $article = Articles::all() -> where("blog_id", $blog-> id);
                return response() -> json($article);
            } else {
                return response()->json(["data" => [
                    "message" => "user not found",
                    "status" => $token
                ]]);
            }
        } else {
            return response()->json(["data" => [
                "message" => "Token is empty"
            ]]);
        }
    }
}
