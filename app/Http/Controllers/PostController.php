<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $post = Post::get();
        return view('admin.post.index', compact('category', 'post'));
    }

    public function createPost(Request $request)
    {
        $validator = $this->checkPostValidation($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if (!empty($request->post_image)) {
            $file = $request->file('post_image');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/postImage', $fileName);
            $data = $this->getPostData($request, $fileName);
        } else {
            $data = $this->getPostData($request, NULL);
        }

        Post::create($data);

        return back();
    }

    //delete post
    public function deletePost($id)
    {
        $postData = Post::where('post_id', $id)->first();
        $dbImageName = $postData['image'];

        Post::where('post_id',$id)->delete();

        if(File::exists(public_path().'/postImage/'.$dbImageName)){
            File::delete(public_path().'/postImage/'.$dbImageName);
        }
        return back();
    }

    //direct update post page
    public function updatePostPage($id){
        $postDetails = Post::where('post_id',$id)->get();
        $category = Category::get();
        $post = Post::get();
        return view('admin.post.update', compact('postDetails', 'category', 'post'));
    }

    //update post
    public function updatePost($id, Request $request)
    {
        $validator = $this->checkPostValidation($request);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $data = $this->requestUpdatePostData($request);

        if(isset($request->postImage)){
            $file = $request->file('post_image');
            $fileName = uniqid().'_'.$file->getClientOriginalName();

            $data['image'] = $fileName;

            $postData = Post::where('post_id',$id)->first();
            $dbImageName = $postData['image'];

            if(File::exists(public_path().'/postImage/'. $dbImageName)){
                File::delete(public_path().'/postImage/'.$dbImageName);
            }

            $file->move(public_path().'/postImage/',$fileName);

            Post::where('post_id', $id)->update($data);
        }else{
            Post::where('post_id', $id)->update($data);
        }
        return back();
    }

    //request update post data
    private function requestUpdatePostData($request)
    {
        return [
            'title' => $request->post_title,
            'description' => $request->post_description,
            'category_id' => $request->post_category,
            'updated_at' => Carbon::now()
        ];
    }

    private function getPostData($request, $fileName)
    {
        return [
            'title' => $request->post_title,
            'description' => $request->post_description,
            'image' => $fileName,
            'category_id' => $request->post_category,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

    private function checkPostValidation($request)
    {
        return Validator::make($request->all(), [
            'post_title' => 'required',
            'post_description' => 'required',
            'post_category' => 'required'
        ]);
    }
}
