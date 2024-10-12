<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroSectionRequest;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HeroSection::orderByDesc('id')->paginate(10);
        return view('admin.hero_section.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero_section.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeroSectionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('banner')) {
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $validated['banner'] = $bannerPath;
            }

            HeroSection::create($validated);
        });

        return redirect('admin.hero_section.index')->with('toast_success', 'Hero Section berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeroSectionRequest $request, HeroSection $heroSection)
    {
        DB::transaction(function () use ($request, $heroSection) {
            $validated = $request->validated();

            if ($request->hasFile('banner')) {
                if ($heroSection->banner) {
                    Storage::disk('public')->delete($heroSection->banner);
                }
                $bannerPath = $request->file('banner')->store('banners', 'public');
                $validated['banner'] = $bannerPath;
            }

            $heroSection->update($validated);
        });

        return back()->with('toast_success', 'Hero Section berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        if ($heroSection->banner) {
            Storage::disk('public')->delete($heroSection->banner);
        }

        $heroSection->delete();

        return back()->with('toast_success', 'Hero Section berhasil dihapus');
    }
}
