<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plate;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index(){
        $plate = plate::latest()->paginate(20);
        return view('userpage.userpage', compact('plate'));
    }
}
