<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'pet_name' => ['required', 'string', 'max:255'],
            'pet_type' => ['required', 'string', 'max:255'],
            'breed' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2048'], // Max 2MB
        ]);
    
        // Store the image and get the path
        $imagePath = $request->file('image')->store('pets', 'public');
    
        // Create a new pet record
        Pet::create([
            'user_id' => Auth::id(),
            'pet_name' => $validated['pet_name'],
            'pet_type' => $validated['pet_type'],
            'breed' => $validated['breed'],
            'image' => $imagePath,
        ]);
    
        // Redirect with a status message
        return redirect()->route('profile')->with('status', 'Pet Added');
    }
    

    /**
     * Update pet information.
     */
    public function update(Request $request, Pet $pet)
    {
        // Ensure the pet belongs to the authenticated user
        if ($pet->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'pet_name' => ['required', 'string', 'max:255'],
            'pet_type' => ['required', 'string', 'max:255'],
            'breed' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($pet->image) {
                Storage::disk('public')->delete($pet->image);
            }
            $validated['image'] = $request->file('image')->store('pets', 'public');
        }

        $pet->update($validated);

        return redirect()->route('profile')->with('status', 'Pet Updated');
    }

    /**
     * Delete a pet.
     */
    public function destroy(Pet $pet)
    {
        // Ensure the pet belongs to the authenticated user
        if ($pet->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete pet image
        if ($pet->image) {
            Storage::disk('public')->delete($pet->image);
        }

        $pet->delete();

        return redirect()->route('profile')->with('status', 'Pet Deleted');
    }
}
