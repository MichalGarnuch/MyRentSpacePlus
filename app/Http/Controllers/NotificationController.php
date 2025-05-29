<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::with('user')->orderBy('sent_at', 'desc')->get();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::pluck('username', 'id');
        return view('notifications.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'type'    => 'required|in:reminder,info,alert',
            'status'  => 'nullable|in:unread,read',
        ]);

        Notification::create($data);

        return redirect()->route('notifications.index')
            ->with('success', 'Powiadomienie dodane');
    }

    public function show(Notification $notification)
    {
        return view('notifications.show', compact('notification'));
    }

    public function edit(Notification $notification)
    {
        $users = User::pluck('username', 'id');
        return view('notifications.edit', compact('notification','users'));
    }

    public function update(Request $request, Notification $notification)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string',
            'type'    => 'required|in:reminder,info,alert',
            'status'  => 'required|in:unread,read',
        ]);

        $notification->update($data);

        return redirect()->route('notifications.index')
            ->with('success', 'Powiadomienie zaktualizowane');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->route('notifications.index')
            ->with('success', 'Powiadomienie usunięte');
    }
}
