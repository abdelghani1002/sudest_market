<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\SellerRequest;
use App\Notifications\SellerRequestAcceptedNotification;
use App\Notifications\SellerRequestRejectedNotification;
use Illuminate\Http\Request;

class SellerRequestController extends Controller
{
    public function index()
    {
        $sellerRequests = SellerRequest::latest()->paginate(5);
        return view('admin.seller-requests.index', compact('sellerRequests'));
    }

    public function store()
    {
        $user = auth()->user();
        // Create seller request
        $sellerRequest = new SellerRequest;
        $sellerRequest->user_id = $user->id;
        $sellerRequest->status = 'pending';
        $user->sellerRequest()->save($sellerRequest);
        return redirect()->back()->with('info', 'Your request has been saved. Please wait for administrative approval.');
    }

    public function update(Request $request, $id)
    {
        $sellerRequest = SellerRequest::findOrFail($id);
        $sellerRequest->update(['status' => $request->status]);

        if ($request->status == 'accepted') {
            $sellerRole = Role::where('name', 'seller')->first();
            $sellerRequest->customer->roles()->sync($sellerRole->id);
            $sellerRequest->customer->notify(new SellerRequestAcceptedNotification());
        } else
            $sellerRequest->customer->notify(new SellerRequestRejectedNotification('Reason')); // add request reason
        return redirect()->back()->with('success', 'Seller request status has been updated.');
    }
}
