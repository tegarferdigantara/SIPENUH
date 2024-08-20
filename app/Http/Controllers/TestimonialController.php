<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('customer')->get();
        return view('admin.pages.testimonial-manage.list', compact('testimonials'));
    }

    public function create()
    {
        $customers = Customer::orderBy('created_at', 'asc')->get();
        return view('admin.pages.testimonial-manage.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|unique:testimonials,customer_id|exists:customers,id',
            'review' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        Testimonial::create($data);
        return redirect()->route('admin.testimonial.list')->with('success', 'Testimoni berhasil ditambah!');
    }

    public function edit(int $testimonialId)
    {
        $testimonial = Testimonial::findOrFail($testimonialId);
        $customers = Customer::orderBy('created_at', 'asc')->get();
        return view('admin.pages.testimonial-manage.edit', compact('testimonial', 'customers'));
    }

    public function update(int $testimonialId, Request $request)
    {
        $data = $request->validate([
            'review' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $testimonial = Testimonial::findOrFail($testimonialId);
        $testimonial->update($data);
        return redirect()->route('admin.testimonial.list')->with('success', 'Testimoni berhasil diubah!');
    }

    public function destroy(int $testimonialId)
    {
        $testimonial = Testimonial::findOrFail($testimonialId);
        $testimonial->delete();
        return redirect()->route('admin.testimonial.list')->with('success', 'Testimoni berhasil dihapus!');
    }
}
