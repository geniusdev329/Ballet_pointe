<?php

namespace App\Http\Controllers\Admin\FirstPage;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $privacy_policies = PrivacyPolicy::orderBy('id', 'desc')->get();
        return view('admin.first-page.privacy-policies.index', compact('privacy_policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.first-page.privacy-policies.create');
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

        $is_check = PrivacyPolicy::first();
        if(isset($is_check)) {
            $alert = array(
                'message' => 'データはすでに存在します。',
                'alert-type' => 'warning'
            );
            return redirect()->route('admin.first-page.privacy-policies.index')->with($alert);
        }    

       
        $privacy_policy = new PrivacyPolicy();
        $privacy_policy->html_content = $request->get('html_content');
        $privacy_policy->content = strip_tags($request->get('html_content'));
        $privacy_policy->status = ($request->get('status') == 'on') ? 1 : 0;
        $privacy_policy->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.first-page.privacy-policies.index')->with($alert);
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
        $privacy_policy = PrivacyPolicy::find($id);
        return view('admin.first-page.privacy-policies.edit', compact('privacy_policy'));
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

        $privacy_policy = PrivacyPolicy::find($id);
        $privacy_policy->html_content = $request->get('html_content');
        $privacy_policy->content = strip_tags($request->get('html_content'));
        $privacy_policy->status = ($request->get('status') == 'on') ? 1 : 0;
        $privacy_policy->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.first-page.privacy-policies.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Retrieve the model instance
        $privacy_policy = PrivacyPolicy::find($id);

        // Check if the model exists
        if ($privacy_policy) {
            // Delete the model
            $privacy_policy->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.first-page.privacy-policies.index')->with($alert);
        }
    }
}
