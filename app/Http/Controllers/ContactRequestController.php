<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactRequest;

class ContactRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contactRequestsHasNotRes = ContactRequest::where('is_response',0)->paginate(4);
        $contactRequestsHasRes = ContactRequest::where('is_response',1)->paginate(4);

        return view('admin.contact_request',['contactRequestsHasNotRes'=>$contactRequestsHasNotRes,'contactRequestsHasRes'=>$contactRequestsHasRes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ContactRequest::where('id',$id)->update(['is_response'=>1]);
        return redirect()->route('contact-request.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
