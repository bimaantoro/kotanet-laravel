@extends('layouts.frontend.master')
@section('title', 'Homepage')

@section('content')
    <div class="container-xl">
        <div class="container my-5">
            <h1 class="text-center mb-5 text-primary">TENTANG KAMI</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">Deskripsi Perusahaan</h2>
                    <p class="card-text">{{ $companyAbout->description }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">VISI</h2>
                            <ul class="list-group list-group-flush">
                                @foreach ($companyAbout->visionKeypoints as $keypoint)
                                    <li class="list-group-item">{{ $keypoint->keypoint }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">MISI</h2>
                            <ul class="list-group list-group-flush">
                                @foreach ($companyAbout->missionKeypoints as $keypoint)
                                    <li class="list-group-item">{{ $keypoint->keypoint }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h1 class="text-center mb-3 text-primary">PRODUK KAMI</h1>
        <p class="text-center mb-4">Produk yang kami jual berupa alat serta perlengkapan untuk server dan jaringan internet.
        </p>

        <div class="mb-4">
            <ul class="nav nav-pills justify-content-center">
                <li class="nav-item">
                    <a class="nav-link {{ $selectedName === 'all' ? 'active' : '' }}"
                        href="{{ route('landing') }}">Semua</a>
                </li>
                @foreach ($productNames as $name)
                    <li class="nav-item">
                        <a class="nav-link {{ $selectedName === $name ? 'active' : '' }}"
                            href="{{ route('landing', ['name' => $name]) }}">{{ $name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->thumbnail) }}" class="card-img-top"
                            alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->about, 100) }}</p>
                            {{-- <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">Learn More</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
        </div>
    </div>
@endsection
