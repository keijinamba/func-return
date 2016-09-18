<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ModelsController extends Controller
{
    public function index() {
    	return view('models/index');
    }
}
