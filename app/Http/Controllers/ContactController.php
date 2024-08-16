<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Contact::query();

        if(request()->has('search')){
            $search = request()->get("search");
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
        }

        if ($request->has('sort_by')) {
            $sortBy = $request->get('sort_by');
            $order = $request->get('order', 'asc');
            $query->orderBy($sortBy, $order);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // $all_contact=$query->paginate(5);
        $all_contact=$query->get();

        $noResults = $all_contact->isEmpty();
        // dd($all_contact->toArray());
        return view('contacts.contacts',compact('all_contact','noResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('contacts.contacts_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:contacts',
            'phone'=>"nullable",
            'address'=>"nullable"
        ]);
        // dd(request()->all());
        $contact_store= new Contact();
        $contact_store->name=request('name');
        $contact_store->email=request('email');
        $contact_store-> phone=request('phone');
        $contact_store-> address=request('address');
        $contact_store->save();
        return redirect()->route('contacts')->with('create','Contact creacted successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contacts=Contact::find($id);
        // dd($contacts->toArray());

        return view('contacts.contactshow',compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contacts=Contact::findOrFail($id);
        return view('contacts.contactsedit',compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        // $contact_id=request('id');
        $contact_store=Contact::find(request()->id);
        $contact_store->name=request('name');
        $contact_store->email=request('email');
        $contact_store-> phone=request('phone');
        $contact_store-> address=request('address');
        $contact_store->save();
        return redirect()->route('contacts')->with('update','Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact_delete=Contact::where('id',$id)->first();
        $contact_delete->delete();
        return redirect()->route('contacts')->with('delete', "Contact Deleted successfully");
    }
}
