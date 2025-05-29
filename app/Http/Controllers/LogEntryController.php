<?php

namespace App\Http\Controllers;

use App\Models\LogEntry;
use Illuminate\Http\Request;

class LogEntryController extends Controller
{
    public function index()
    {
        $entries = LogEntry::with('user')->orderBy('timestamp', 'desc')->get();
        return view('logs.index', compact('entries'));
    }

    public function create()
    {
        return view('logs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action'  => 'required|string|max:255',
            'timestamp' => 'required|date',
        ]);

        LogEntry::create($data);

        return redirect()->route('logs.index')
            ->with('success', 'Log entry dodany pomyślnie');
    }

    public function show(LogEntry $logEntry)
    {
        return view('logs.show', compact('logEntry'));
    }

    public function edit(LogEntry $logEntry)
    {
        return view('logs.edit', compact('logEntry'));
    }

    public function update(Request $request, LogEntry $logEntry)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'action'  => 'required|string|max:255',
            'timestamp' => 'required|date',
        ]);

        $logEntry->update($data);

        return redirect()->route('logs.index')
            ->with('success', 'Log entry zaktualizowany pomyślnie');
    }

    public function destroy(LogEntry $logEntry)
    {
        $logEntry->delete();
        return redirect()->route('logs.index')
            ->with('success', 'Log entry usunięty pomyślnie');
    }
}
