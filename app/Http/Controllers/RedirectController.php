<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/dashboardRT');
        } else if(auth()->user()->role_id === 1) {
            return redirect('/dashboardRW');
        }else{
            return redirect('/dashboardPD');
        }
    }
}
