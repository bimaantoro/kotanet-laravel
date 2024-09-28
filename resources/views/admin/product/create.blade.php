@extends('layouts.master', ['title' => 'Tambah Produk'])



@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card rounded-lg border-0">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Produk</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="product-name" class="form-label required">Nama Produk</label>
                                    <input type="text" class="form-control" id="product-name" name="name"
                                        placeholder="Masukkan nama produk" value="{{ old('name') }}">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label required d-block">Foto Produk</label>
                                    <div class="d-flex align-items-center mb-2">
                                        <img src="https://fakeimg.pl/308x205/?text=Product&font=lexend"
                                            alt="Product thumbnail" id="thumbnail-preview" class="img-thumbnail me-3"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                        <div>
                                            <label for="thumbnail-input" class="btn btn-outline-primary mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-upload" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                    <path d="M7 9l5 -5l5 5"></path>
                                                    <path d="M12 4l0 12"></path>
                                                </svg>
                                                Pilih Gambar
                                            </label>
                                            <input type="file" class="form-control d-none" name="thumbnail"
                                                id="thumbnail-input" accept="image/*"
                                                onchange="previewImage(this, 'thumbnail-preview')">
                                            <div id="file-name" class="text-muted small">
                                                Tidak ada file yang dipilih
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Unggah gambar dengan ukuran maksimal 2MB. Format yang
                                        diizinkan: JPG, JPEG, PNG.</small>
                                </div>
                                <div class="mb-4">
                                    <label for="product-about" class="form-label required">Tentang Produk</label>
                                    <textarea class="form-control" id="product-about" name="about" rows="5" placeholder="Deskripsikan produk Anda">{{ old('about') }}</textarea>
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
                                        Simpan Produk
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

@push('js')
    <script>
        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const fileNameElement = document.getElementById('file-name');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
                fileNameElement.textContent = input.files[0].name;
            } else {
                preview.src = "https://fakeimg.pl/308x205/?text=Product&font=lexend";
                fileNameElement.textContent = "Tidak ada file yang dipilih";
            }
        }
    </script>
@endpush
