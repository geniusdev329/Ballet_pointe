<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nickname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'ballet_career' => 'required',
                'ballet_level' => 'required',
                'foot_shape' => 'required',
                'foot_size' => 'required',
                'foot_width' => 'required',
                'foot_height' => 'required',
                'mail_magazin' => 'required',
                'tos_confirm' => 'required',
                'privacy_policy_confirm' => 'required',
                'type' => 'required',
            ],
            [
                'nickname.required' => 'これは必須項目です。',
                'email.required' => 'これは必須項目です。',
                'password.required' => 'これは必須項目です。',
                'password_confirmation.required' => 'これは必須項目です。',
                'gender.required' => 'これは必須項目です。',
                'age.required' => 'これは必須項目です。',
                'ballet_career.required' => 'これは必須項目です。',
                'ballet_level.required' => 'これは必須項目です。',
                'foot_shape.required' => 'これは必須項目です。',
                'foot_size.required' => 'これは必須項目です。',
                'foot_width.required' => 'これは必須項目です。',
                'foot_height.required' => 'これは必須項目です。',
                'mail_magazin.required' => 'これは必須項目です。',
                'tos_confirm.required' => 'これは必須項目です。',
                'privacy_policy_confirm.required' => 'これは必須項目です。',
                'type.required' => 'これは必須項目です。',
            ]
        );

        $user = new User();
        $user->nickname = $request->get('nickname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->gender = $request->get('gender');
        $user->age = $request->get('age');
        $user->ballet_career = $request->get('ballet_career');
        $user->ballet_level = $request->get('ballet_level');
        $user->foot_shape = $request->get('foot_shape');
        $user->foot_size = $request->get('foot_size');
        $user->foot_width = $request->get('foot_width');
        $user->foot_height = $request->get('foot_height');
        $user->mail_magazin = $request->get('mail_magazin');
        $user->tos_confirm = $request->get('tos_confirm') === 'on' ? 1 : 0;
        $user->privacy_policy_confirm = $request->get('privacy_policy_confirm') === 'on' ? 1 : 0;
        $user->type = $request->get('type');
        $user->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.users.index')->with($alert);
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
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nickname' => 'required',
                'email' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'ballet_career' => 'required',
                'ballet_level' => 'required',
                'foot_shape' => 'required',
                'foot_size' => 'required',
                'foot_width' => 'required',
                'foot_height' => 'required',
                'mail_magazin' => 'required',
                'tos_confirm' => 'required',
                'privacy_policy_confirm' => 'required',
                'type' => 'required',
            ],
            [
                'nickname.required' => 'これは必須項目です。',
                'email.required' => 'これは必須項目です。',
                'password.required' => 'これは必須項目です。',
                'password_confirmation.required' => 'これは必須項目です。',
                'gender.required' => 'これは必須項目です。',
                'age.required' => 'これは必須項目です。',
                'ballet_career.required' => 'これは必須項目です。',
                'ballet_level.required' => 'これは必須項目です。',
                'foot_shape.required' => 'これは必須項目です。',
                'foot_size.required' => 'これは必須項目です。',
                'foot_width.required' => 'これは必須項目です。',
                'foot_height.required' => 'これは必須項目です。',
                'mail_magazin.required' => 'これは必須項目です。',
                'tos_confirm.required' => 'これは必須項目です。',
                'privacy_policy_confirm.required' => 'これは必須項目です。',
                'type.required' => 'これは必須項目です。',
            ]
        );

        $user = User::find($id);
        $user->nickname = $request->get('nickname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->gender = $request->get('gender');
        $user->age = $request->get('age');
        $user->ballet_career = $request->get('ballet_career');
        $user->ballet_level = $request->get('ballet_level');
        $user->foot_shape = $request->get('foot_shape');
        $user->foot_size = $request->get('foot_size');
        $user->foot_width = $request->get('foot_width');
        $user->foot_height = $request->get('foot_height');
        $user->mail_magazin = $request->get('mail_magazin');
        $user->tos_confirm = $request->get('tos_confirm') === 'on' ? 1 : 0;
        $user->privacy_policy_confirm = $request->get('privacy_policy_confirm') === 'on' ? 1 : 0;
        $user->type = $request->get('type');
        $user->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.users.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

         // Check if the model exists
         if ($user) {
             // Delete the model
             $user->delete();
             $alert = array(
                 'message' => 'データが正常に削除されました!',
                 'alert-type' => 'success'
             );
 
             return redirect()->route('admin.users.index')->with($alert);
         }
    }
}
