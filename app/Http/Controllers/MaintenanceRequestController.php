<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use App\Models\Apartment;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    public function index()
    {
        $requests = MaintenanceRequest::with('apartment')->orderBy('request_date','desc')->get();
        return view('maintenance_requests.index', compact('requests'));
    }

    public function create()
    {
        $apartments = Apartment::pluck('apartment_number','id');
        return view('maintenance_requests.create', compact('apartments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'description'  => 'required|string',
            'request_date' => 'required|date',
            'status'       => 'required|in:open,in_progress,closed',
        ]);

        MaintenanceRequest::create($data);

        return redirect()->route('maintenance_requests.index')
            ->with('success', 'Zgłoszenie serwisowe dodane');
    }

    public function show(MaintenanceRequest $maintenanceRequest)
    {
        return view('maintenance_requests.show', compact('maintenanceRequest'));
    }

    public function edit(MaintenanceRequest $maintenanceRequest)
    {
        $apartments = Apartment::pluck('apartment_number','id');
        return view('maintenance_requests.edit', compact('maintenanceRequest','apartments'));
    }

    public function update(Request $request, MaintenanceRequest $maintenanceRequest)
    {
        $data = $request->validate([
            'apartment_id' => 'required|exists:apartments,id',
            'description'  => 'required|string',
            'request_date' => 'required|date',
            'status'       => 'required|in:open,in_progress,closed',
        ]);

        $maintenanceRequest->update($data);

        return redirect()->route('maintenance_requests.index')
            ->with('success', 'Zgłoszenie serwisowe zaktualizowane');
    }

    public function destroy(MaintenanceRequest $maintenanceRequest)
    {
        $maintenanceRequest->delete();
        return redirect()->route('maintenance_requests.index')
            ->with('success', 'Zgłoszenie serwisowe usunięte');
    }
}
