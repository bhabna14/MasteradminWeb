<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bankdetail;
use App\Models\Childrendetail;
use App\Models\Addressdetail;
use App\Models\IdcardDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\SebayatFamily;
use App\Models\SocialMedia;
use DB;


class sebayatregisterController extends Controller
{
    //
    public function sebayatregister(){
        return view('admin/sebayatregister');
    }
    public function sebayatlist(){
        $sebayatlists = User::all();
        return view('admin/sebayatlist',compact('sebayatlists'));

        
    }
    public function addDeathDate(Request $request, $user_id)
    {
        // Validate the request input
        $request->validate([
            'death_date' => 'required|date',
        ]);

        // Find the user by the user_id and update the status to 'deactivated'
        $user = User::where('user_id', $user_id)->first();

        if ($user) {
            $user->update([
                'status' => 'deactivated',
                'death_date' => $request->input('death_date') // Assuming you have a 'death_date' column in the users table
            ]);

            return redirect()->back()->with('success', 'Death date added and status updated successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
    public function saveregister(Request $request){

        $request->validate([
           'first_name' => 'required',
           'last_name' => 'required',
           'email' => 'required|email',
           'phonenumber' => 'required',
           'dob' => 'required',
           'password' => 'required|min:8',
           'bloodgrp' => 'required',
           'qualification' => 'required',
           'userphoto' => 'required|file|max:10240',
           'fathername' => 'required',
           'mothername' => 'required',

           'marital' => 'required',
           'spouse' => 'required|',
           'childrenname' => 'required',
           'idproof' => 'required',
           'idnumber' => 'required',
           'uploadoc.*' => 'required|file|max:10240',

           'bankname' => 'required',
           'branchname' => 'required|',
           'ifsccode' => 'required',
           'accname' => 'required',
           'accnumber' => 'required',

           'datejoin' => 'required',
           'bedhaseba' => 'required',
           'seba' => 'required',
           'templeid' => 'required',
           
          
           
            
        ]);
        $userdata = new User();
        if($request->hasFile('userphoto')){

            $path = 'assets/uploads/userphoto/'.$userdata->userphoto;
           
           
            $file = $request->file('userphoto');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/userphoto/',$filename);
            $userdata->userphoto=$filename;
          }
          
        $userdata->userid = $request->userid;
        $userdata->name = $request->first_name;
        $userdata->first_name = $request->first_name;
        $userdata->last_name = $request->last_name;
        $userdata->email  = $request->email ;
        $userdata->phonenumber = $request->phonenumber;
        $userdata->dob = $request->dob;

        $userdata->password = Hash::make($request->password);
        $userdata->role = 'user';
        $userdata->bloodgrp = $request->bloodgrp;
        $userdata->qualification  = $request->qualification ;
        $userdata->fathername = $request->fathername;
        $userdata->mothername = $request->mothername;

        $userdata->marital = $request->marital;
        $userdata->spouse  = $request->spouse ;
        $userdata->datejoin = $request->datejoin;
        $userdata->seba = $request->seba;
        $userdata->templeid  = $request->templeid ;
        $userdata->bedhaseba = $request->bedhaseba;
        $userdata->status = "active";

        $userdata->application_status = "approved";

        $userdata->approved_date = now();
        $userdata->otp = "234234";
        $userdata->added_by =Auth::guard('admins')->user()->name;
        $userdata->save();

        // $childrennames = $request->childrenname;

        foreach ($request->childrenname as $childrenname) {
            // Childrendetail::create(['childrenname' => $childrenname]);
            
            $childata = new Childrendetail();
            $childata->userid = $request->userid;
            $childata->childrenname =  $childrenname;
            $childata->dob =  $request->dob;
            $childata->gender =  $request->gender;
            $childata->save();
        }

        foreach ($request->idproof as $key => $idproof) {
            $idnumber = $request->idnumber[$key];
            $file = $request->file('uploadoc')[$key];
            
            // Handle file upload
            // $filePath = $file->storeAs('public', $file->getClientOriginalName());

            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->move(public_path('uploads'), $fileName);
            // Save form data to the database
            $iddata = new IdcardDetail();
            $iddata->userid = $request->userid;
            $iddata->idproof =  $idproof;
            $iddata->idnumber =  $idnumber;
            $iddata->uploadoc = 'uploads/'.$fileName; // Save file path in the database
            $iddata->save();
        }

       
        
        $addressdata = new Addressdetail();
        $addressdata->userid = $request->userid;
        $addressdata->preaddress = $request->preaddress;
        $addressdata->prepost = $request->prepost;
        $addressdata->predistrict = $request->predistrict;
        $addressdata->prestate = $request->prestate;
        $addressdata->precountry = $request->precountry;
        $addressdata->prepincode = $request->prepincode;
        $addressdata->prelandmark = $request->prelandmark;

        $addressdata->peraddress = $request->peraddress;
        $addressdata->perpost = $request->perpost;
        $addressdata->perdistri = $request->perdistri;
        $addressdata->perstate = $request->perstate;
        $addressdata->percountry = $request->percountry;
        $addressdata->perpincode = $request->perpincode;
        $addressdata->perlandmark = $request->perlandmark;
        $addressdata->save();

        $bankdata = new Bankdetail();
        $bankdata->userid = $request->userid;
        $bankdata->bankname = $request->bankname;
        $bankdata->branchname = $request->branchname;
        $bankdata->ifsccode = $request->ifsccode;
        $bankdata->accname = $request->accname;
        $bankdata->accnumber = $request->accnumber;
        $bankdata->save();


        return redirect()->back()->with('success', 'Data saved successfully.');
    }
    public function editsebayat($user_id){
        // dd("hi");
        // $userinfo = User::where('user_id', $user_id)->first();
        // $bankinfo = Bankdetail::where('user_id', $user_id)->first();
        // $childinfos = Childrendetail::where('user_id', $user_id)
        //                             ->where('status','active')->get();
        // $iddetails = IdcardDetail::where('user_id', $user_id) ->where('status','active')->get();
        // $address = Addressdetail::where('user_id', $user_id)->first();
        // $bankinfo = Bankdetail::where('user_id', $user_id)->first();

        $userinfo = User::where('user_id', $user_id)->first();
        dd($userinfo);
        $bankinfo = Bankdetail::where('user_id', $user_id)->first();
        $childinfos = Childrendetail::where('user_id', $user_id)
                                            ->where('status','active')->get();
        $iddetails = IdcardDetail::where('user_id', $user_id) ->where('status','active')->get();
        $address = Addressdetail::where('user_id', $user_id)->first();
        $bankinfo = Bankdetail::where('user_id', $user_id)->first();
        $familyinfo = SebayatFamily::where('user_id', $user_id)->first();
        $socialmedia = SocialMedia::where('user_id', $user_id)->first();

       
        return view('admin/editsebayat',compact('userinfo','bankinfo','childinfos','iddetails','address','bankinfo','familyinfo','socialmedia'));
    }
    public function viewsebayat($user_id){
    
        $user_id = urldecode($user_id); // Decode URL-encoded user_id
        // dd($user_id); // Debug the user_id
         $userinfo = User::where('user_id', $user_id)->first();
         // dd($userinfo); // Check the result of the query
        $bankinfo = Bankdetail::where('user_id', $user_id)->first();
        $childinfos = Childrendetail::where('user_id', $user_id)
                                            ->where('status','active')->get();
        $iddetails = IdcardDetail::where('user_id', $user_id) ->where('status','active')->get();
        $address = Addressdetail::where('user_id', $user_id)->first();
        $bankinfo = Bankdetail::where('user_id', $user_id)->first();
        $familyinfo = SebayatFamily::where('user_id', $user_id)->first();
        $socialmedia = SocialMedia::where('user_id', $user_id)->first();

       
        return view('admin/viewsebayat',compact('userinfo','bankinfo','childinfos','iddetails','address','bankinfo','familyinfo','socialmedia'));

    }
    public function approve(Request $request, $user_id)
    {
        // Update the status to 'approved'
        User::where('user_id', $user_id)
            ->update(['application_status' => 'approved']);
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application approved successfully.');
    }

    public function reject(Request $request, $user_id)
    {
        // Update the status to 'rejected'
        User::where('user_id', $user_id)
            ->update(['application_status' => 'pending']);
        
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application rejected successfully.');
    }
    public function childupdate(Request $request,$id){
        $childdata = Childrendetail::find($id);
        $childdata->childrenname = $request->childrenname;
        $childdata->update();
        return redirect()->back()->with('success', 'Child Info Updated successfully');

    }
    public function updateuserinfo(Request $request,$id){
       
       // Retrieve the user record
   
       $userdata = User::find($id);
        if($request->hasFile('userphoto')){

            $path = 'assets/uploads/userphoto/'.$userdata->userphoto;
        
        
            $file = $request->file('userphoto');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/userphoto/',$filename);
            $userdata->userphoto=$filename;
        }
       $userdata->userid = $request->userid;
       $userdata->name = $request->input('first_name');
       $userdata->first_name = $request->input('first_name');
       $userdata->last_name = $request->last_name;
       $userdata->email  = $request->email ;
       $userdata->phonenumber = $request->phonenumber;
       $userdata->bloodgrp = $request->bloodgrp;
       $userdata->dob = $request->dob;
       $userdata->update();


       return redirect()->back()->with('success', 'User updated successfully');
    }
    public function updateFamilyInfo(Request $request,$id){
            $userdata = User::find($id);
        $userdata->userid = $request->userid;

            $userdata->fathername = $request->fathername;
            $userdata->mothername = $request->mothername;

            $userdata->marital = $request->marital;
            $userdata->spouse  = $request->spouse ;
            $userdata->update();
           
        return redirect()->back()->with('success', 'Family Info updated successfully');


    }
    public function updateChildInfo(Request $request){
    
        
        foreach ($request->childrenname as $key => $childrenname) {
            $dob = $request->dob[$key];
            $gender = $request->gender[$key];

            
            // Save form data to the database
            $childata = new Childrendetail();
            $childata->userid = $request->userid;
            $childata->childrenname =  $childrenname;

            $childata->dob =  $dob;
            $childata->gender =  $gender;
            $childata->status =  "active";

            $childata->save();
        }
         return redirect()->back()->with('success', 'Child Info updated successfully');


    }
    public function updatechildstatus($id)
    {
        $affected = Childrendetail::where('id', $id)
                        ->update(['status' => 'deleted']);

            return redirect()->back()->with('success', 'Data delete successfully.');
    
    }

    public function updateIdInfo(Request $request){
        foreach ($request->idproof as $key => $idproof) {
            $idnumber = $request->idnumber[$key];
            $file = $request->file('uploadoc')[$key];
            
            // Handle file upload
            // $filePath = $file->storeAs('public', $file->getClientOriginalName());

            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->move(public_path('uploads'), $fileName);
            // Save form data to the database
            $iddata = new IdcardDetail();
            $iddata->userid = $request->userid;
            $iddata->idproof =  $idproof;
            $iddata->idnumber =  $idnumber;
            $iddata->uploadoc = 'uploads/'.$fileName; // Save file path in the database
            $iddata->status =  "active";

            $iddata->save();
        }
       return redirect()->back()->with('success', 'User updated successfully');


    }
    public function updateIdstatus($id)
    {
        $affected = IdcardDetail::where('id', $id)
                        ->update(['status' => 'deleted']);

            return redirect()->back()->with('success', 'Data delete successfully.');
    
    }
    public function updateAddressInfo(Request $request,$id){
       
        // Retrieve the user record
    // dd($id);
        $userdata = Addressdetail::find($id);
        // $userdata = new Addressdetail();
        $userdata->userid = $request->userid;
        $userdata->preaddress = $request->preaddress;
        $userdata->prepost = $request->prepost;
        $userdata->predistrict = $request->predistrict;
        $userdata->prestate = $request->prestate;
        $userdata->precountry = $request->precountry;
        $userdata->prepincode = $request->prepincode;
        $userdata->prelandmark = $request->prelandmark;

        $userdata->peraddress = $request->peraddress;
        $userdata->perpost = $request->perpost;
        $userdata->perdistri = $request->perdistri;
        $userdata->perstate = $request->perstate;
        $userdata->percountry = $request->percountry;
        $userdata->perpincode = $request->perpincode;
        $userdata->perlandmark = $request->perlandmark;
        $userdata->update();
 
 
        return redirect()->back()->with('success', 'Address updated successfully');
     }

     public function updatenewAddress(Request $request){
       
        // Retrieve the user record
    // dd($id);
        // $userdata = Addressdetail::find($id);
        $userdata = new Addressdetail();
        $userdata->userid = $request->userid;
        $userdata->preaddress = $request->preaddress;
        $userdata->prepost = $request->prepost;
        $userdata->predistrict = $request->predistrict;
        $userdata->prestate = $request->prestate;
        $userdata->precountry = $request->precountry;
        $userdata->prepincode = $request->prepincode;
        $userdata->prelandmark = $request->prelandmark;

        $userdata->peraddress = $request->peraddress;
        $userdata->perpost = $request->perpost;
        $userdata->perdistri = $request->perdistri;
        $userdata->perstate = $request->perstate;
        $userdata->percountry = $request->percountry;
        $userdata->perpincode = $request->perpincode;
        $userdata->perlandmark = $request->perlandmark;
        $userdata->save();
 
 
        return redirect()->back()->with('success', 'Address updated successfully');
     }
     public function updateBankInfo(Request $request,$id){
       
        // Retrieve the user record
    // dd($id);
        $bankdata = Bankdetail::find($id);
        $bankdata->userid = $request->userid;
        $bankdata->bankname = $request->bankname;
        $bankdata->branchname = $request->branchname;
        $bankdata->ifsccode = $request->ifsccode;
        $bankdata->accname = $request->accname;
        $bankdata->accnumber = $request->accnumber;
        $bankdata->update();
 
 
        return redirect()->back()->with('success', 'Bank Details updated successfully');
     }

     public function updatenewBankInfo(Request $request){
       
        // Retrieve the user record
    // dd($id);
        // $bankdata = Bankdetail::find($id);
        $bankdata->userid = $request->userid;
        $bankdata->bankname = $request->bankname;
        $bankdata->branchname = $request->branchname;
        $bankdata->ifsccode = $request->ifsccode;
        $bankdata->accname = $request->accname;
        $bankdata->accnumber = $request->accnumber;
        $bankdata->save();
 
 
        return redirect()->back()->with('success', 'Bank Details updated successfully');
     }

     public function updateotherInfo(Request $request,$id){
       
        // Retrieve the user record
    // dd($id);
        $userdata = User::find($id);
        // dd($userdata);
        $userdata->userid = $request->userid;
        $userdata->datejoin = $request->datejoin;
        $userdata->seba = $request->seba;
        $userdata->templeid  = $request->templeid ;
        $userdata->bedhaseba = $request->bedhaseba;
        $userdata->update();
 
 
        return redirect()->back()->with('success', 'Other Details updated successfully');
     }


    public function dltsebayat($userid)
{
    $affected = User::where('userid', $userid)
                        ->update(['status' => 'deleted']);

            return redirect()->back()->with('success', 'Data delete successfully.');

}
}
