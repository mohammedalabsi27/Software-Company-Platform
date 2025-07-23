<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(config('pagination.count'));
        return view('admin.subscribers.index', get_defined_vars());
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return to_route('admin.subscribers.index')->with('success', __('keywords.deleted_successfully'));
    }
}
