<?php

namespace App\Http\Controllers\depan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index() {

        return view('depan.contact');
    }
    public function sendWa(Request $request) {
        $request->validate([
            'name' => 'required|string|min:5',
            'phone'=> 'required|string|numeric|min:12',
            'message'=> 'required|string|min:10'
        ]);

        // Logic to send WhatsApp message using the $name, $phone, and $message

        return redirect()->back()->with('success', 'Pesan WhatsApp berhasil dikirim!');
    }
}
