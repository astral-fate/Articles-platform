<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Topic;
use App\Models\Category;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::limit(5)->with('latest_topic')->get();
        $topics = Topic::with('category')
                ->latest()
                ->take(3)
                ->get();
        $featuredtopics = Topic::with('category')
                ->where('trending', true)
                ->limit(2)
                ->get();
                
        $testimonials = Testimonial::where('is_published', 1)
                ->latest()
                ->take(3)
                ->get();
        
        // Add this line for debugging
        \Log::info('Fetched testimonials: ', $testimonials->toArray());
                
        return view('public.index', compact('testimonials', 'topics', 'categories', 'featuredtopics'));
    }


}