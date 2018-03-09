<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\Post as PostResources;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get posts
        $posts = Post::paginate(10);

        // Return collection of posts
        return PostResources::collection($posts);
    }

    public function likeDislike(Request $request)
    {
        $validate = $this->validations($request, "like");

    }

    public function accessToken(Request $request)
    {
        $validate = $this->validations($request, "login");
        if ($validate["error"]) {
            return $this->prepareResult(false, [], $validate['errors'], "Error while validating user");
        }
        $user = User::where("email", $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return $this->prepareResult(200, ["accessToken" => $user->createToken('Todo App')->accessToken], [], "User Verified");
            } else {
                return $this->prepareResult(400, [], ["password" => "Wrong passowrd"], "Password not matched");
            }
        } else {
            return $this->prepareResult(403, [], ["email" => "Unable to find user"], "User not found");
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function prepareResult($status, $data, $errors,$msg)
    {
        return ['status' => $status,'data'=> $data,'message' => $msg,'errors' => $errors];
    }

    /**
     * Get a validator for an incoming Todo request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $type
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function validations($request,$type){
        $errors = [];
        $error = false;
        if($type == "login"){
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            if($validator->fails()){
                $error = true;
                $errors = $validator->errors();
            }elseif($type == "like") {
                $validator = Validator::make($request->all(), [
                    'todo' => 'required',
                    'description' => 'required',
                    'category' => 'required'
                ]);
            }elseif($type == "dislike") {
                $validator = Validator::make($request->all(), [
                    'todo' => 'filled',
                    'description' => 'filled',
                    'category' => 'filled'
                ]);
            }
        }elseif($type == 'like'){
            dd($request->toArray());
        }
        return ["error" => $error,"errors"=>$errors];
    }












}
