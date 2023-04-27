<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;



class BlogController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function create_blog(Request $request)
    {

        $bearer = $request->header('authorization');
        if ($bearer != "") {
            $token = explode(" ", $bearer)[1];
            $user = User::where("token", $token)->first();
            if ($user != null) {
                $validator = Validator::make($request->all(), [
                    "blog_name" => "required",
                ]);
                if ($validator->fails()) {
                    return response()->json([
                        "error" => $validator->errors()
                    ]);
                } else {
                    $blog = new Blogs();
                    $blog->blog_name = $request->input('blog_name');
                    $blog->user_id = $user->id;
                    $blog->save();
                    return response()->json("blog created");
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
    public function show(Request $request){
        $bearer = $request->header('authorization');
        if ($bearer != "") {
            $token = explode(" ", $bearer)[1];
            $user = User::where("token", $token)->first();
            if ($user != null) {
                $blog = Blogs::all() -> where("user_id", $user->id)->first();
                return response() -> json($blog);
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
