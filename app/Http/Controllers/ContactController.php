<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::user()->id)->get();
        return view('contacts', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $user_id = Auth::user()->id;
        $storagedFile = $this->createImageFromBase64($request);
        if ($storagedFile) {
            $newContact = $request->all();
            $newContact['user_id'] = $user_id;
            $newContact['image'] = $storagedFile;
            $contact = Contact::create($newContact);
            if ($contact) return redirect('/contacts')->with('message', 'Contact saved!');

            return back()->with('message', 'Contact saved!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contact::find($id);
        if ($contato) {
            return view('contact', ['contact' => $contato]);
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::find($id);
        $updateContact = $request->all();

        if ($contact) {
            if ($request->file('image')) {
                $storagedFile = $this->createImageFromBase64($request);
                if ($storagedFile) {
                    $updateContact['image'] = $storagedFile;
                }
            }
            $contactFill = $contact->fill($updateContact);
            $contactUpdated = $contactFill->save();
            if ($contactUpdated) return redirect('contacts/' . $contact->id . '/edit');
            return back()->with('message', 'Contact not updated.');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function saveImageGetPath($request)
    {
        $user_id = Auth::user()->id;
        $storagedFile = $request->file('image')->store('users/' . $user_id . '/contacts/' .
            strtolower($request->first_name . '_' . $request->last_name));

        return $storagedFile;
    }

    public function createImageFromBase64($request)
    {
        $user_id = Auth::user()->id;
        $file_data = $request->input('imageData');
        $file_name = 'image_' . time() . '.png';
        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data);
        if ($file_data != "") {
            $relativePath = 'users/' . $user_id . '/contacts/' .
                strtolower($request->first_name . '_' . $request->last_name);

            $file = Storage::disk('public')->put($relativePath . '/' . $file_name, base64_decode($file_data));
            if ($file) return $relativePath . '/' . $file_name;
            return "";
        }
        return "";
    }

}
