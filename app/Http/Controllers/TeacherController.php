<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherController extends Controller {
    
    //Teacher dashboard
    public function dashboard(Request $request) {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['student', 'parent']);
        })
        ->orderBy('id', 'desc')
        ->get();

        return view('teacher.dashboard',compact('users'));
    }

    //Add User Screen
    public function addUser() {
        return view('teacher.add-user');
    }

    //Store User to Database
    public function createUser(Request $request) {
        
        $validator = Validator::make($request->all(), [
                        'name' => ['required', 'string', 'max:255'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                        'role' => ['required', 'string', 'in:student,parent'],
                        'status' => ['required', 'string', 'in:active,pending,inactive'],
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                    ],[
                        'role.in' => 'Please choose either "Student or Parent.',
                        'status.in' => 'Please choose either "Active or Pending or Inactive.'
                    ]);

        if ($validator->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            //Add user to database
            $user = User::create([
                        'name'      => $request->name,
                        'email'     => $request->email,
                        'status'    => $request->status,
                        'password'  => Hash::make($request->password),
                    ]);
            $user->assignRole($request->role);

            if($user){
                session()->flash('success',__('User Added successfully'));
            } else {
                session()->flash('error',__('User Not Added, Please try again'));
            }                    
        }    
        
        return redirect()->route('teacher.dashboard');
    }

     // Edit user method
     public function editUser($id) {
        $user = User::findOrFail($id);
        return view('teacher.edit-user', compact('user'));
    }

    //Update User
    public function updateUser(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore((int)$request->id)],
            'role' => ['required', 'string', 'in:student,parent'],
            'status' => ['required', 'string', 'in:active,pending,inactive'],            
        ],[
            'role.in' => 'Please choose either "Student or Parent.',
            'status.in' => 'Please choose either "Active or Pending or Inactive.'
        ]);

        if ($validator->fails()) {
            // Redirect back with errors
            return redirect()->back()->withErrors($validator)->withInput();
        } else {

            //Update user
            $user = User::find((int)$request->id);   
            $user->update([
                        'name'      => $request->name,
                        'email'     => $request->email,
                        'status'    => $request->status,                        
                    ]);
            $user->syncRoles($request->role);

            if($user){
                session()->flash('success',__('User Updated successfully'));
            } else {
                session()->flash('error',__('User Not Updated, Please try again'));
            }                    
        }    
        
        return redirect()->route('teacher.dashboard');
        
    }

    //Delete User
    public function deleteUser($id) {        
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        try {
            $user->delete();
            return redirect()->back()->with('success', 'User Deleted Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User Not Deleted, Please try again');
        }
    }

}
