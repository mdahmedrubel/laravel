<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //taken from newpasswordController.php file

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        // Toaster push notification function
        $notification    = array(
            'message'    => 'User Logout Successfully',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    }//end method here



    //function method for profile view
    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }//end method here

    //function method for edit profile
    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }//end method here


    //update store profile
    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')) {
            $file = $request->file('profile_image');

            //profile image replace when user update his profile image
            @unlink(public_path('upload/admin_images/'.$data->profile_image));

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        // Toaster push notification function
        $notification    = array(
            'message'    => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }//end method here


    //change password method for user
    public function changePassword(){
        return view('admin.admin_change_password');


    }//end method here


    // updatePassword method for user 
    public function updatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',

        ]);


        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)) {
            $users = User::find(Auth::id()); 
            $users->password = bcrypt($request->newpassword);
            $users->save();


            session()->flash('message', 'Password Updated Successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old Password Not Matched');
            return redirect()->back();
        }

        
    }//end method here
    // updatePassword method for user 



}
