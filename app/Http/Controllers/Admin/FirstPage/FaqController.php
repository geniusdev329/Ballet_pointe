<?php

namespace App\Http\Controllers\Admin\FirstPage;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        $faqs = Faq::orderBy('position_th', 'desc')->
        orderBy('created_at', 'desc')->get();
        return view('admin.first-page.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.first-page.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'html_content' => 'required',
            ],
            [
                'title.required' => '件名を入力してください。',
                'html_content.required' => '本文を入力してください。',
            ]
        );

       

        $faq = new Faq();
        $faq->title = $request->get('title');
        $faq->position_th = $request->get('position_th');
        $faq->html_content = $request->get('html_content');
        $faq->content = strip_tags($request->get('html_content'));
        $faq->status = ($request->get('status') == 'on') ? 1 : 0;
        $faq->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.first-page.faq.index')->with($alert);
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
        $faq = Faq::find($id);
        return view('admin.first-page.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'html_content' => 'required',
            ],
            [
                'title.required' => '件名を入力してください。',
                'html_content.required' => '本文を入力してください。',
            ]
        );


        $faq = Faq::find($id);
        $faq->title = $request->get('title');
        $faq->position_th = $request->get('position_th');
        $faq->html_content = $request->get('html_content');
        $faq->content = strip_tags($request->get('html_content'));
        $faq->status = ($request->get('status') == 'on') ? 1 : 0;
        $faq->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.first-page.faq.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the model instance
        $faq = Faq::find($id);

        // Check if the model exists
        if ($faq) {
            // Delete the model
            $faq->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.first-page.faq.index')->with($alert);
        }
    }
}
