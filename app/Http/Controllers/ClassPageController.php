<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\FitnessClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClassPageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $schedules = Schedule::where('user_id', $user->id)
            ->with('fitnessClass')
            ->get();
        $classes = FitnessClass::all();
        
        return view('dashboard', compact('schedules', 'classes'));
    }

    public function viewClass($id)
    {
        $class = FitnessClass::findOrFail($id);
        $schedules = Schedule::where('class_id', $id)
            ->where('user_id', Auth::id())
            ->with('fitnessClass')
            ->get();
        
        return view('viewclass', compact('class', 'schedules'));
    }

    public function bookClass($id)
    {
        $class = FitnessClass::findOrFail($id);
        return view('bookclass', compact('class'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'trainer' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);
    
        $user = Auth::user();
        $class = FitnessClass::findOrFail($id);
    
        Schedule::create([
            'user_id' => $user->id,
            'class_id' => $class->id,
            'date' => $validated['date'],
            'time' => Carbon::parse($validated['time'])->format('H:i'),
            'trainer' => $validated['trainer'],
        ]);
    
        return redirect()->route('dashboard')->with('success', 'Class booked successfully!');
    }
}
