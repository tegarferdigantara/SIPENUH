<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('customer')->get();
        return view('admin.pages.testimonial-manage.list', compact('testimonials'));
    }
}
