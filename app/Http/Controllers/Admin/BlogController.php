<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                // 'image' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'content.required' => '内容を入力してください。',
                // 'image.required' => '画像を選択してください',
                'status.required' => 'ステータスを選択してください。',
            ]
        );

        $blog = new Blog();
        $blog->title = $request->get('title');
        $blog->html_content = $request->get('content');
        $blog->content = strip_tags($request->get('content'));
        $blog->user_id = Auth::user()->id;
        $blog->status = (int)$request->get('status');
        if ($request->hasFile('blog_img')) {
            $imageName = time() . '.' . $request->file('blog_img')->extension();
            $request->file('blog_img')->move(public_path('images/blogs'), $imageName);
            $blog->image = $imageName;
        }
        $blog->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blogs.index')->with($alert);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                // 'image' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'タイトルを入力してください。',
                'content.required' => '内容を入力してください。',
                // 'image.required' => '画像を選択してください',
                'status.required' => 'ステータスを選択してください。',
            ]
        );

        $blog = Blog::find($id);
        $blog->title = $request->get('title');
        $blog->html_content = $request->get('content');
        $blog->content = strip_tags($request->get('content'));
        $blog->user_id = Auth::user()->id;
        $blog->status = (int)$request->get('status');
        if ($request->hasFile('blog_img')) {
            $imageName = time() . '.' . $request->file('blog_img')->extension();
            $request->file('blog_img')->move(public_path('images/blogs'), $imageName);
            $blog->image = $imageName;
        }
        $blog->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blogs.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        // Check if the model exists
        if ($blog) {
            // Delete the model
            $blog->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.blogs.index')->with($alert);
        }
    }
}
