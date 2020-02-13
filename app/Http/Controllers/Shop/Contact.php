<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact as Contacts;

class Contact extends Controller
{
    public function index(Request $request)
    {
       $contact = Contacts::select('*')->first();
       return view('contact.index',compact('contact'));
    }
}
