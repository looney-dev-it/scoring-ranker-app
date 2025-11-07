<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class FaqController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('questions')->get();
        return view('faq', compact('categories'));
    }
}
