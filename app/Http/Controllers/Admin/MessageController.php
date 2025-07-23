<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::paginate(config('pagination.count'));
        return view('admin.messages.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('admin.messages.show', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return to_route('admin.messages.index')->with('success', __('keywords.deleted_successfully'));
    }
}
