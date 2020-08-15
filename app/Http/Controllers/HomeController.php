<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class HomeController extends WebController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $publications = Publication::with('user')->withCount('comments')->paginate(15);
        return view('home', ['publications' => $publications]);
    }
}
