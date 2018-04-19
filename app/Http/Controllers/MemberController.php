<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        
    }
    public function showEnterForm()
    {
        return view('ceo.form');
    }
    public function index()
    {
        return view('ceoIndex');
    }
}
