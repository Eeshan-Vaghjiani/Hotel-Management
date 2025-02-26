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
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add room: ' . $e->getMessage());
        }
    }
    public function view_room() {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    public function edit($id)
    {
        // Find the room by ID
        $room = Room::findOrFail($id);

        // Return the edit view with the room data
        return view('admin.edit', compact('room'));
    }

    public function destroy($id)
    {
        // Find the room by ID
        $room = Room::findOrFail($id);

        // Delete the room
        $room->delete();

        // Redirect to the view_room method with a success message
        return redirect()->action([AdminController::class, 'view_room'])->with('success', 'Room deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'room_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'wifi' => 'required|string|in:yes,no',
            'room_type' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
        ]);

        // Find the room by ID
        $room = Room::findOrFail($id);

        // Update the room with validated data
        $room->update($validatedData);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('room'), $imagename);
            $room->image = $imagename;
            $room->save(); // Save the updated image name
        }

        // Redirect to the view_room method with success message
        return redirect()->action([AdminController::class, 'view_room'])->with('success', 'Room updated successfully!');
    }
}
