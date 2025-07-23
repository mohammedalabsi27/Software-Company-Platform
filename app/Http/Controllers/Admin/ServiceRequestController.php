<?php

namespace App\Http\Controllers\Admin;

use App\Events\RequestStatusUpdatedEvent;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Notifications\RequestStatusUpdatedNotification;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::latest()->paginate(config('pagination.count'));
        return view('admin.requests.index', get_defined_vars());

    }

    public function show(ServiceRequest $request)
    {
        return view('admin.requests.show', get_defined_vars());
    }

    public function edit(ServiceRequest $request)
    {
        return view('admin.requests.edit', get_defined_vars());
    }

    public function update(Request $req, ServiceRequest $request)
    {
        $request->update([
            'status' => $req->status,
            'admin_note' => $req->admin_note,
        ]);

        $request->user->notify(new RequestStatusUpdatedNotification($request));

        event(new RequestStatusUpdatedEvent($request->user_id, $request));

        return to_route('admin.requests.index')->with('success', __('keywords.request_updated_successfully'));
    }
}
