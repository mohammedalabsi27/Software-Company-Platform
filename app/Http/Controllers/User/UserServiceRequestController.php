<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Service;
use App\Models\ServiceRequest;
use App\Notifications\NewServiceRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserServiceRequestController extends Controller
{
    public function create(Service $service) 
    {
        return view('user.requests.create', get_defined_vars());
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'description' => 'required|string|max:1000',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
        ]);
        
        $data = $request->only('service_id', 'description');
        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('attachment')) {
            $file = $request->attachment;
            $newFile = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('requests', $newFile, 'public');
            $data['attachment'] = $newFile;
        }

        $serviceRequest = ServiceRequest::create($data);

        $admin = Admin::find(1);
        $admin->notify(new NewServiceRequestNotification($serviceRequest));

        return to_route('user.requests.index')->with('success', 'Your Request sent Successfully');
    }

    public function myRequests()
    {
        $requests = ServiceRequest::where('user_id', Auth::user()->id)->latest()->paginate(config('pagination.count'));
        return view('user.requests.index', get_defined_vars());
    }

    public function show(ServiceRequest $request)
    {
        abort_if($request->user_id !== Auth::user()->id, 403);

        Auth::user()->unreadNotifications
        ->where('data.request_id', $request->id)->each->markAsRead();
        
        return view('user.requests.show', get_defined_vars());
    }
}
