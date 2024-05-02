<?php

namespace App\Http\Controllers;

use App\Models\ChatbotSessions;
use App\Http\Requests\StoreChatbotSessionsRequest;
use App\Http\Requests\UpdateChatbotSessionsRequest;

class ChatbotSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatbotSessionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatbotSessions $chatbotSessions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatbotSessions $chatbotSessions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatbotSessionsRequest $request, ChatbotSessions $chatbotSessions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatbotSessions $chatbotSessions)
    {
        //
    }
}
