<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->get();
        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notifications.create');
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

        $notification = new Notification();
        $notification->title = $request->get('title');
        $notification->html_content = $request->get('html_content');
        $notification->content = strip_tags($request->get('html_content'));
        $notification->status = ($request->get('status') == 'on') ? 1 : 0;
        $notification->save();


        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notifications.index')->with($alert);
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
        $notification = Notification::find($id);
        return view('admin.notifications.edit', compact('notification'));
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


        $notification = Notification::find($id);
        $notification->title = $request->get('title');
        $notification->html_content = $request->get('html_content');
        $notification->content = strip_tags($request->get('html_content'));
        $notification->status = ($request->get('status') == 'on') ? 1 : 0;
        $notification->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.notifications.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Retrieve the model instance
         $notification = Notification::find($id);

         // Check if the model exists
         if ($notification) {
             // Delete the model
             $notification->delete();
             $alert = array(
                 'message' => 'データが正常に削除されました!',
                 'alert-type' => 'success'
             );
 
             return redirect()->route('admin.notifications.index')->with($alert);
         }
    }
}
