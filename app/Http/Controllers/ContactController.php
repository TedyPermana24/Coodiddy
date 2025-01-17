<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Store a new contact.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'phone_number' => ['required', 'string', 'max:15'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        // Create a new contact record
        Contact::create([
            'user_id' => Auth::id(),
            'phone_number' => $validated['phone_number'],
            'city' => $validated['city'],
            'address' => $validated['address'],
        ]);

        // Redirect with a status message
        return redirect()->route('profile')->with('status', 'Contact Added');
    }

    /**
     * Update contact information.
     */
    public function update(Request $request, Contact $contact)
    {
        // Ensure the contact belongs to the authenticated user
        if ($contact->user_id !== Auth::id()) {
            abort(403);
        }

        // Validate the incoming data
        $validated = $request->validate([
            'phone_number' => ['required', 'string', 'max:15'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        // Update the contact record
        $contact->update($validated);

        // Redirect with a status message
        return redirect()->route('profile')->with('status', 'Contact Updated');
    }

    /**
     * Delete a contact.
     */
    public function destroy(Contact $contact)
    {
        // Ensure the contact belongs to the authenticated user
        if ($contact->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete the contact record
        $contact->delete();

        // Redirect with a status message
        return redirect()->route('profile')->with('status', 'Contact Deleted');
    }
}
