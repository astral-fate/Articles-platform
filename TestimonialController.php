<?php

namespace App\Http\Controllers;



use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_published', true)->latest()->take(5)->get();
        return view('public.index', compact('testimonials'));
    }
    public function create()
    {
        return view('admin.testimonials.create');
    }
    
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_published' => 'nullable|boolean',
            ]);

            // Set is_published to false if not checked
            $validated['is_published'] = $request->has('is_published');

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('testimonials', 'public');
                if (!$path) {
                    throw new \Exception('Failed to store the image.');
                }
                $validated['image'] = $path;
            }

            $testimonial = Testimonial::create($validated);

            if (!$testimonial) {
                throw new \Exception('Failed to create the testimonial.');
            }

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating testimonial: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create testimonial. Please try again.');
        }
    }
    public function getPublishedTestimonials()
    {
        return Testimonial::where('is_published', true)
                          ->latest()
                          ->take(5)
                          ->get();
    }

  

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        // Update this line to correctly handle the checkbox
        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}