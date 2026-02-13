<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function dashboard()
    {
       
    }

   
    public function drivers()
    {
     $users = User::orderBy('name')->get();
     
       
    }

   
    public function travelers()
    {

  


       
    }

    public function rides()
    {
       
    }
}
