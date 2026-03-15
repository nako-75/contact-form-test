<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only(['first_name','last_name','gender','email','address','building','category_id','detail']); 
        $contact['tel'] = $request->tel_1 . $request->tel_2 . $request->tel_3;
        $contact['tel_1'] = $request->tel_1;
        $contact['tel_2'] = $request->tel_2;
        $contact['tel_3'] = $request->tel_3;
        return view('confirm', compact('contact'));
    }

    public function thanks(Request $request){
        $contact = $request->only(['first_name','last_name','gender','email','tel','address','building','category_id','detail']);
        Contact::create($contact);
        return view('thanks');
    }
}
