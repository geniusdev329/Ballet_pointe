<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makers = Maker::orderBy('id', 'desc')->get();
        return view('admin.makers.index', compact('makers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.makers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => 'メーカー名を入力してください',
                'type.required' => 'メーカータイプを選択してください',
            ]
        );

        $maker = new Maker();
        $maker->name = $request->get('name');
        $maker->type = $request->get('type');
        if ($request->hasFile('maker_img')) {
            $imageName = time() . '.' . $request->file('maker_img')->extension();
            $request->file('maker_img')->move(public_path('images/maker_logos'), $imageName);
            $maker->logo_img = $imageName;
        }
        $maker->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.makers.index')->with($alert);
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
        $maker = Maker::find($id);
        return view('admin.makers.edit', compact('maker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => 'メーカー名を入力してください',
                'type.required' => 'メーカータイプを選択してください',
            ]
        );

        $maker = Maker::find($id);
        $maker->name = $request->get('name');
        $maker->type = $request->get('type');
        if ($request->hasFile('maker_img')) {
            $imageName = time() . '.' . $request->file('maker_img')->extension();
            $request->file('maker_img')->move(public_path('images/maker_logos'), $imageName);
            $maker->logo_img = $imageName;
        }
        $maker->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.makers.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maker = Maker::find($id);

        // Check if the model exists
        if ($maker) {
            // Delete the model
            $maker->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.makers.index')->with($alert);
        }
    }
}
