<?php
namespace App\Http\Controllers;
use App\Models\LogEntry;

/** An audit trail is a read model, never an editable CRUD resource. */
final class LogEntryController extends Controller
{
    public function index()
    {
        $log_entries = LogEntry::with('user')->orderBy('timestamp', 'desc')->orderBy('id', 'desc')->paginate(100);
        return view('log_entries.index', compact('log_entries'));
    }
}
