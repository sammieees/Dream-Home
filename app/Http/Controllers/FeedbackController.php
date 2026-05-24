<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display all feedback
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->get();

        return view('feedback.index', compact('feedbacks'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        $properties = Property::all();

        $tenants = Tenant::all();

        return view('feedback.create', compact(
            'properties',
            'tenants'
        ));
    }

    /**
     * Store feedback
     */
    public function store(Request $request)
    {
        $request->validate([

            'property_id' => 'required',

            'tenant_id' => 'required',

            'rating' => 'required|numeric|min:1|max:5',

            'comment' => 'required',

        ]);

        Feedback::create([

            'property_id' => $request->property_id,

            'tenant_id' => $request->tenant_id,

            'rating' => $request->rating,

            'comment' => $request->comment,

        ]);

        return redirect()
            ->route('feedback.index')
            ->with('success', 'Feedback submitted successfully.');
    }

    /**
     * Show single feedback
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show edit form
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update feedback
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Delete feedback
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()
            ->route('feedback.index')
            ->with('success', 'Feedback deleted successfully.');
    }
}