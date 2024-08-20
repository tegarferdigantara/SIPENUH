<?php

namespace App\Http\Controllers\MainPage;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\UmrahPackage;

class HomeController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $faqs = Faq::all();
        $umrahPackages = UmrahPackage::where('status', ['ACTIVE'])->get();
        return view('user.pages.home', compact('testimonials', 'faqs', 'umrahPackages'));
    }
}
