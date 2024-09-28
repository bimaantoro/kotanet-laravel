<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyAboutRequest;
use App\Models\CompanyAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $abouts = CompanyAbout::paginate(10);

        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyAboutRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $companyAbout = CompanyAbout::create($validated);

            if (!empty($validated['vision_keypoints'])) {
                foreach ($validated['vision_keypoints'] as $visionKeypoint) {
                    $companyAbout->visionKeypoints()->create([
                        'keypoint' => $visionKeypoint
                    ]);
                }
            }

            if (!empty($validated['mission_keypoints'])) {
                foreach ($validated['mission_keypoints'] as $missionKeypoint) {
                    $companyAbout->missionKeypoints()->create([
                        'keypoint' => $missionKeypoint
                    ]);
                }
            }
        });

        return redirect(route('admin.about.index'))->with('toast_success', 'Informasi Perusahaan Berhasil Ditambahkan');
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
    public function update(CompanyAboutRequest $request, CompanyAbout $about)
    {
        DB::transaction(function () use ($request, $about) {
            $validated = $request->validated();

            $about->update($validated);

            if (!empty($validated['vision_keypoints'])) {
                $about->visionKeypoints()->delete();
                foreach ($validated['vision_keypoints'] as $visionKeypoint) {
                    $about->visionKeypoints()->create([
                        'keypoint' => $visionKeypoint
                    ]);
                }
            }

            if (!empty($validated['mission_keypoints'])) {
                $about->missionKeypoints()->delete();
                foreach ($validated['mission_keypoints'] as $missionKeypoint) {
                    $about->missionKeypoints()->create([
                        'keypoint' => $missionKeypoint
                    ]);
                }
            }
        });

        return redirect(route('admin.about.index'))->with('toast_success', 'Informasi Perusahaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyAbout $about)
    {
        DB::transaction(function () use ($about) {
            $about->delete();
        });

        return back()->with('toast_success', 'Informasi Perusahaan berhasil dihapus');
    }
}
