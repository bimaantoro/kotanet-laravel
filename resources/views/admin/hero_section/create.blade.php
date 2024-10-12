@extends('layouts.backend.master', ['title' => 'Tambah Produk'])



@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card rounded-lg border-0">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Hero Section</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero_section.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="heading" class="form-label fw-bold required">Judul</label>
                                    <input type="text" class="form-control" id="heading" name="heading"
                                        placeholder="Masukkan judul" value="{{ old('heading') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="subheading" class="form-label fw-bold required">Sub Judul</label>
                                    <input type="text" class="form-control" id="subheading" name="subheading"
                                        placeholder="Masukkan sub judul" value="{{ old('subheading') }}">
                                </div>
                                <div class="mb-4">
                                    <div class="form-label fw-bold required">Banner</div>
                                    <input type="file" class="form-control" name="banner" />
                                </div>
                                <div class="mb-4">
                                    <label for="achievement" class="form-label fw-bold">Penghargaan (Opsional)</label>
                                    <input type="text" class="form-control" id="achievement" name="achievement"
                                        placeholder="" value="{{ old('achievement') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="pathvideo" class="form-label fw-bold">Link video (Opsional)</label>
                                    <input type="text" class="form-control" id="pathvideo" name="path_video"
                                        placeholder="" value="{{ old('path_video') }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M5 12l6 6" />
                                            <path d="M5 12l6 -6" />
                                        </svg>
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-device-floppy">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                            <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M14 4l0 4l-6 0l0 -4" />
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
