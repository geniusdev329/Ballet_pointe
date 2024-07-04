<?php

namespace App\Http\Controllers\Admin\FirstPage;

use App\Http\Controllers\Controller;
use App\Models\Guideline;
use Illuminate\Http\Request;

class GuidelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guidelines = Guideline::orderBy('id', 'desc')->get();
        return view('admin.first-page.guidelines.index', compact('guidelines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.first-page.guidelines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'html_content' => 'required',
            ],
            [
                'html_content.required' => '本文を入力してください。',
            ]
        );

        $is_check = Guideline::first();
        if(isset($is_check)) {
            $alert = array(
                'message' => 'データはすでに存在します。',
                'alert-type' => 'warning'
            );
            return redirect()->route('admin.first-page.guidelines.index')->with($alert);
        }    

       
        $guideline = new Guideline();
        $guideline->html_content = $request->get('html_content');
        $guideline->content = strip_tags($request->get('html_content'));
        $guideline->status = ($request->get('status') == 'on') ? 1 : 0;
        $guideline->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.first-page.guidelines.index')->with($alert);
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
        $guideline = Guideline::find($id);
        return view('admin.first-page.guidelines.edit', compact('guideline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'html_content' => 'required',
            ],
            [
                'html_content.required' => '本文を入力してください。',
            ]
        );

        $guideline = Guideline::find($id);
        $guideline->html_content = $request->get('html_content');
        $guideline->content = strip_tags($request->get('html_content'));
        $guideline->status = ($request->get('status') == 'on') ? 1 : 0;
        $guideline->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.first-page.guidelines.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the model instance
        $guideline = Guideline::find($id);

        // Check if the model exists
        if ($guideline) {
            // Delete the model
            $guideline->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.first-page.guidelines.index')->with($alert);
        }
    }
}
