<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;

use Auth;

class SecretController extends Controller{

public function showSecretPage()    {

    if(Auth::user())    {
        return view('secret.page');
    } else {

        // return redirect('/login');
        abort(404);
    }
}

}