<?php

namespace App\Http\Controllers\Admin;

use App\Model\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::all();

        return view('back-end.contact-us.index')->withContact($contact_us);
    }

    public function create()
    {
        return view('back-end.contact-us.create');
    }

    public function edit($id)
    {
        $contact = ContactUs::find($id);

        return view('back-end.contact-us.edit')->withContact($contact);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            $contact  = new ContactUs;
            $contact->google_map       = $request->google_map;
            $contact->phone_no_1       = $request->phone_no_1;
            $contact->phone_no_2       = $request->phone_no_2;
            $contact->contact_address  = $request->contact_us_address;
            $contact->email_address_1  = $request->email_address_1;
            $contact->email_address_2  = $request->email_address_2;
            $contact->fax_address_1    = $request->fax_address_1;
            $contact->fax_address_2    = $request->fax_address_2;
            $contact->status           = $request->status;
            $contact->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();


        Toastr::info('Contact Address Create Succesfully', 'Contact Information', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index');
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $contact  = ContactUs::find($id);
            $contact->google_map       = $request->google_map;
            $contact->phone_no_1       = $request->phone_no_1;
            $contact->phone_no_2       = $request->phone_no_2;
            $contact->contact_address  = $request->contact_us_address;
            $contact->email_address_1  = $request->email_address_1;
            $contact->email_address_2  = $request->email_address_2;
            $contact->fax_address_1    = $request->fax_address_1;
            $contact->fax_address_2    = $request->fax_address_2;
            $contact->status           = $request->status;
            $contact->save();

        }catch (\Exception $e) {
            DB::rollback();
            echo '<pre>';
            echo '======================<br>';
            print_r($e->getMessage());
            echo '<br>======================';
            exit();
        }

        DB::commit();


        Toastr::info('Contact Address Create Succesfully', 'Contact Information', ["positionClass" => "toast-top-right"]);
        return redirect()->route('contact.index');
    }
}
