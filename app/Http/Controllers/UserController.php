<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Corcel\Model\Post;
use Corcel\Model\Taxonomy;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

     public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'profile']]);
    }
    public function profile($id)
    {
        $user = User::find($id);
        return view('user.profile', compact('user') );
    }

 
    

   




}


