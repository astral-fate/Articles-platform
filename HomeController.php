<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $testimonialController;

    public function __construct(TestimonialController $testimonialController)
    {
        $this->testimonialController = $testimonialController;
    }

    public function index()
    {
        $testimonials = $this->testimonialController->getPublishedTestimonials();

        // Log the fetched testimonials for debugging
        Log::info('Fetched testimonials: ' . $testimonials->toJson());

        return view('public.index', compact('testimonials'));
    }
}