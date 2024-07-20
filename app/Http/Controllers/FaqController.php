<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Http\Resources\FaqResource;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::orderBy('updated_at', 'ASC')->get();

        return view('admin.pages.faq-manage.list', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.faq-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        $data = $request->validated();
        Faq::create($data);

        return redirect()->route('admin.faq.list')->with('success', 'FAQ berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq): JsonResponse
    {
        $faqs = $faq->get();

        return (FaqResource::collection($faqs))->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $faqId, Faq $faq)
    {
        $faqData = $faq->findOrFail($faqId);

        return view('admin.pages.faq-manage.edit', compact('faqData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $faqId, UpdateFaqRequest $request, Faq $faq)
    {
        $faqData = $faq->findOrFail($faqId);

        $faqData->update($request->validated());

        return redirect()->route('admin.faq.list')->with('success', 'FAQ berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $faqId, Faq $faq)
    {
        $faqData = $faq->findOrFail($faqId);

        $faqData->delete();

        return redirect()->route('admin.faq.list')->with('success', 'FAQ berhasil dihapus!');
    }
}
