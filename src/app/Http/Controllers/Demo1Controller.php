<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class Demo1Controller extends Controller
{
    public function index()
    {
        return view('demo1', []);
    }
}