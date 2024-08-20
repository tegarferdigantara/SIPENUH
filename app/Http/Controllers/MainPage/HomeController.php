<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $faqs = Faq::all();
        return view('user.pages.home', compact('testimonials', 'faqs'));
    }
}
