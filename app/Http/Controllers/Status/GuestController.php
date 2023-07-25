<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class GuestController extends Controller
{

    public function index() {

        return view('guest.index');
    }
}
