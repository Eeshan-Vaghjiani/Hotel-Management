<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
class AdminController extends Controller
{
    public function index(){
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                return view ('home.index');
            }
            else if ($usertype == 'admin'){
                return view('admin.index');
            }
            else{
                return redirect()->back();
            }
        }
    }
    public function home() {
        return view('home.index');
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        // Create a new Room instance
        $data = new Room();
        // Assign values from the request to the Room instance
        $data->room_title = $request->title; // Ensure the input name matches
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type; // Ensure the input name matches

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);
            $data->image = $imagename;
        }

        // Save the Room instance to the database
        try {
            $data->save();
            return redirect()->route('rooms.index')->with('success', 'Room added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add room: ' . $e->getMessage());
        }
    }
    public function view_room() {
        $data = Room::all();
        Return view('admin.view_room',compact('data'));
    }
}
