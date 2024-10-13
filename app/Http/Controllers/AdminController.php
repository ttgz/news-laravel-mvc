<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcribe;
use App\Models\Advertisement;
use App\Models\Contact;
use App\Models\ContactRequest;
 
 

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.index');
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function showSubcribe(){
        $subcribes = Subcribe::paginate(4);
        return view('admin.subcribe',['subcribes'=>$subcribes]);
    }
    public function showEditSubcribe(string $id){
        $subcribe = Subcribe::find($id);
        $subcribes = Subcribe::paginate(4);
        return view('admin.subcribe',['subcribes'=>$subcribes,'subcribe'=>$subcribe]);
    }
    public function addSubcribe(Request $req){
        $subcribe = new Subcribe();
        $subcribe->email = $req['email'];
        $subcribe->save();
        return redirect()->route('admin.subcribe')->with('success',"Thêm đăng ký thành công!");
    }
    public function editSubcribe(Request $req){
        Subcribe::where('id',$req->id)->update(['email'=>$req->email]);
        return redirect()->route('admin.subcribe')->with('success','Cập nhật đăng ký thành công!');
    }
    public function searchSubcribe(Request $req){
        $result = Subcribe::where('email', 'like', $req['key'].'%')->paginate(4);
       return view('admin.subcribe',['subcribes'=>$result]);
    }

    public function showAdvertisement(){
        $advertisements = Advertisement::paginate(4);
        return view('admin.advertisement',['advertisements'=>$advertisements]);
    }

    public function addAdvertisement(Request $req){
        $ad = new Advertisement();
        $ad->content = $req['content'];
        $ad->image = $req['image'];
        $ad->save();
        return redirect()->route('admin.advertisement')->with('success','Thêm quảng cáo thành công');
    }
    public function showEditAdvertisement(string $id){
        $ad = Advertisement::find($id);
        $ads = Advertisement::paginate(4);
        return view('admin.advertisement',['advertisements'=>$ads,'advertisement'=>$ad]);
    }

    public function editAdvertisement(Request $req){
        Advertisement::where('id',$req['id'])->update(['content'=>$req['content'],'published_at'=>$req['published_at'],'image'=>$req['image'],'status'=>$req['status']]);
        return redirect()->route('admin.advertisement')->with('success','Cập nhật quảng cáo thành công!!!');
    }
    public function searchAdvertisement(Request $req){
        $result = Advertisement::where('content', 'like', $req['key'].'%')->paginate(4);
        return view('admin.advertisement',['advertisements'=>$result]);
    }  
    
   
    public function showContact(){
        $contact = Contact::find(1);
        return view('admin.contact',['contact'=>$contact]);
    }
    public function editContact(Request $req){
        Contact::where('id',1)->update(['name'=>$req['name'],'numberphone'=>$req['numberphone'],'email'=>$req['email'],'address'=>$req['address'],'facebook'=>$req['facebook'],'about'=>$req['about'],'logo'=>$req['logo']]);
        return redirect()->route('admin.contact')->with('success','Cập nhật thông tin liên hệ thành công!!!');
    }

    public function showContactRequest(){
        $contactRequestsHasNotRes = ContactRequest::where('is_response',0)->paginate(4);
        $contactRequestsHasRes = ContactRequest::where('is_response',1)->paginate(4);

        return view('admin.contact_request',['contactRequestsHasNotRes'=>$contactRequestsHasNotRes,'contactRequestsHasRes'=>$contactRequestsHasRes]);
    }
    public function editContactRequest(string $id){
        ContactRequest::where('id',$id)->update(['is_response'=>1]);
        return redirect()->route('admin.contact_request');
    }
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
