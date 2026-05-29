<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::latest()->get();

        return view('admin.message.index', ['data' => $data]);
    }

    public function show($id)
    {
        $data = Message::find($id);

        $data->status = 1;
        $data->save();

        return view('admin.message.show', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = Message::find($id);

        $data->note = $request->note;
        $data->save();

        return redirect()->route('admin.message.show', $id)->with('success', 'Note saved successfully.');
    }

    public function destroy($id)
    {
        Message::find($id)->delete();

        return redirect()->route('admin.message.index')->with('success', 'Message deleted successfully.');
    }
}
