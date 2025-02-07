<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function home()
    {
        $inventaris = Inventaris::all();
        return view('home', compact('inventaris'));
    }
}
