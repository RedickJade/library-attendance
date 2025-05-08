<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->latest()->paginate(20);
        return Inertia::render('Attendance/Index', ['attendances' => $attendances]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user.name' => 'required|string|max:255',
            'day_note' => 'nullable|string|max:255',
            'morning_in' => 'nullable',
            'morning_out' => 'nullable',
            'afternoon_in' => 'nullable',
            'afternoon_out' => 'nullable',
            'evening_in' => 'nullable',
            'evening_out' => 'nullable',
        ]);

        $user = User::create([
            'name' => $data['user']['name'],
            'email' => strtolower(str_replace(' ', '_', $data['user']['name'])) . '+' . now()->timestamp . '@library.local',
            'password' => bcrypt('defaultpassword'),
        ]);

        $user->attendances()->create([
            'day_note' => $data['day_note'] ?? '',
            'morning_in' => $data['morning_in'],
            'morning_out' => $data['morning_out'],
            'afternoon_in' => $data['afternoon_in'],
            'afternoon_out' => $data['afternoon_out'],
            'evening_in' => $data['evening_in'],
            'evening_out' => $data['evening_out'],
        ]);

        return redirect()->route('attendance.index');
    }

    public function update(Request $request, Attendance $attendance)
    {
        $attendance->update($request->only([
            'day_note',
            'morning_in', 'morning_out',
            'afternoon_in', 'afternoon_out',
            'evening_in', 'evening_out',
        ]));

        $attendance->user->update([
            'name' => $request->input('user.name')
        ]);

        return back()->with('success', 'Updated.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->user()->delete();
        $attendance->delete();

        return back()->with('success', 'Employee removed.');
    }
}
