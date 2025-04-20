<?php

namespace App\Http\Controllers;

use App\Models\HelpPost;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class HelpPostController extends Controller
{
    public function index() {
        // route --> /ninjas/
        // fetch all records & pass into the index view
  
        // $ninjas = Ninja::all();
        $helpposts = HelpPost::orderBy('created_at', 'desc')->paginate(10);
  
        return view('post.index', [ "helpposts" => $helpposts]);
      }
  
      public function show($id) {
        // route --> /ninjas/{id}
        $helppost = HelpPost::findOrFail($id);

        return view('post.show', ["helppost" => $helppost]);
      }
  
      public function create() {
        // route --> /ninjas/create
        $volunteers = Volunteer::orderBy('name')->get();
        return view('post.create', compact('volunteers'));
      }
  
      public function store(Request $request) {
        // --> /ninjas/ (POST)
        // hanlde POST request to store a new ninja record in table
        $validated = $request->validate([
          'user_name' => 'required|string|max:255',
          'heading' => 'required|string|max:255',
          'importance' => 'nullable|boolean',
          'txt' => 'required|string',
          'volunteer_id' => 'nullable|exists:volunteers,id',
      ]);
  
      // Устанавливаем importance в false если не отмечено
      $validated['importance'] = $request->has('importance');
  
      HelpPost::create($validated);
  
      return redirect()->route('post.index');
      }
  
      public function destroy($id) {
        // --> /ninjas/{id} (DELETE)
        // handle delete request to delete a ninja record from table
      }
  
      // edit() and update() for edit view and update requests
      // we won't be using these routes
}
