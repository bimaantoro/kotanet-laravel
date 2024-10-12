<?php

namespace App\Http\Controllers;

use App\Models\CompanyAbout;
use App\Models\HeroSection;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::orderByDesc('id')->take(1)->get();
        $abouts = CompanyAbout::with(['visionKeypoints', 'missionKeypoints'])->get();
        $products = Product::all();

        return view('front.index', compact('heroSection', 'abouts', 'products'));
    }
}
