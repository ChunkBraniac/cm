<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    // Method to display the add contact page
    public static function addContactPage()
    {
        return view('add.addcontact');
    }

    // Method to add a new contact
    public static function addContact(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'contact_name' => 'required',
                'contact_email' => 'required|email|unique:contacts,contact_email,', // Validation rule for email uniqueness
                'contact_phone' => 'required|unique:contacts,contact_phone,', // Validation rule for phone uniqueness
                'contact_address' => 'required',
                'company' => 'required',
                'job_title' => 'required',
                'notes' => 'required'
            ]);

            // Add the logged-in user's ID to the request data
            $request['user_id'] = Auth::user()->id;

            // Create the new contact
            Contacts::create($request->all());

            // Redirect with success message if contact creation is successful
            return redirect()->route('contact.add')->with('success', 'Contact created successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            // Handle the exception if contact creation fails
            return back()->withErrors(['message' => 'Failed to save contact. Please try again.']);
        }
    }

    // Method to display all contacts
    public static function myContacts()
    {
        // Retrieve all contacts from the database
        $mycontacts = Contacts::all();

        // Return the view with the retrieved contacts
        return view('add.mycontacts', compact('mycontacts'));
    }

    // Method to display the edit contact page
    public static function edit($id)
    {
        // Find the contact with the given ID
        $editContact = Contacts::findOrFail($id);

        // Return the view with the contact data
        return view('add.editcontact', compact('editContact'));
    }

    // Method to update a contact
    public static function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'contact_name' => 'required',
            'contact_email' => 'required|email|unique:contacts,contact_email,' . $id,
            'contact_phone' => 'required|unique:contacts,contact_phone,' . $id,
            'company' => 'required',
            'job_title' => 'required',
            'notes' => 'required',
        ]);

        // Find the contact to be updated
        $update = Contacts::findOrFail($id);
        // Update the contact data
        $update->update($request->all());

        // Redirect with success message if update is successful
        return redirect()->route('view.contacts')->with('status', 'success');
    }

    // Method to delete a contact
    public static function destroy($id)
    {
        // Find the contact to be deleted
        $destroy = Contacts::findOrFail($id);
        // Delete the contact
        $destroy->delete();

        // Redirect to the contacts view page
        return redirect()->route('view.contacts');
    }
}
