<?php

namespace App\Http\Controllers;

use App\Models\CustomerAuditLog;
use Illuminate\Http\Request;

class CustomerAuditLogController extends Controller
{
    public function index()
    {
        $logs = CustomerAuditLog::all();
        return view('admin.pages.customer-log.list', compact('logs'));
    }
}
