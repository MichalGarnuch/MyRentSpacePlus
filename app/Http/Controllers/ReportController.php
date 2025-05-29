<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('user')->orderBy('generated_at', 'desc')->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $users = User::pluck('username', 'id');
        return view('reports.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'     => 'required|exists:users,id',
            'report_type' => 'required|in:financial,usage,summary',
            'data'        => 'required|json',
        ]);

        Report::create([
            'user_id'     => $data['user_id'],
            'report_type' => $data['report_type'],
            'data'        => $data['data'],
            'generated_at'=> now(),
        ]);

        return redirect()->route('reports.index')
            ->with('success', 'Raport wygenerowany');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        $users = User::pluck('username', 'id');
        return view('reports.edit', compact('report','users'));
    }

    public function update(Request $request, Report $report)
    {
        $data = $request->validate([
            'user_id'     => 'required|exists:users,id',
            'report_type' => 'required|in:financial,usage,summary',
            'data'        => 'required|json',
        ]);

        $report->update($data);

        return redirect()->route('reports.index')
            ->with('success', 'Raport zaktualizowany');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')
            ->with('success', 'Raport usunięty');
    }
}
