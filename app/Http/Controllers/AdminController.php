<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function dashboard()
    {
       
    }

   
 public function drivers()
    {
        $drivers = User::where('role','driver')->latest()->get();
        return view('admin.drivers',compact('drivers'));
    }

   
    public function travelers()
    {
       
    }

    public function rides()
    {
       
    }
}
