<?php

namespace App\Http\Controllers;

use App\Model\Pertanyaan;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
    	$data['list_pertanyaan'] = Pertanyaan::orderBy('created_at', 'DESC')->paginate(1);
    	return view('welcome', $data);
    }
}
