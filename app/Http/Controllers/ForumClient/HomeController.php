<?php

namespace App\Http\Controllers\ForumClient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index(Request $request) {
        return view('forumclient.home');
    }
}
