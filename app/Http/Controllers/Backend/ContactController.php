<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function create() {
        return view('contact.create');
    }

    public function conplete() {
        return view('contact.complete');
    }
}
