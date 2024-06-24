<?php

namespace App\Http\Controllers\Admin\FirstPage;

use App\Http\Controllers\Controller;
use App\Models\Tou;
use Illuminate\Http\Request;

class TouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_tou = Tou::orderBy('id', 'desc')->get();
        return view('admin.first-page.tou.index', compact('all_tou'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.first-page.tou.create');
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

       
        $tou = new Tou();
        $tou->html_content = $request->get('html_content');
        $tou->content = strip_tags($request->get('html_content'));
        $tou->status = ($request->get('status') == 'on') ? 1 : 0;
        $tou->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.first-page.tou.index')->with($alert);
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
        $tou = Tou::find($id);
        return view('admin.first-page.tou.edit', compact('tou'));
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

        $tou = Tou::find($id);
        $tou->html_content = $request->get('html_content');
        $tou->content = strip_tags($request->get('html_content'));
        $tou->status = ($request->get('status') == 'on') ? 1 : 0;
        $tou->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.first-page.tou.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the model instance
        $tou = Tou::find($id);

        // Check if the model exists
        if ($tou) {
            // Delete the model
            $tou->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.first-page.tou.index')->with($alert);
        }
    }
}
