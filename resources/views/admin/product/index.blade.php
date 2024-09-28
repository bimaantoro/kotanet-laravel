@extends('layouts.backend.master', ['title' => 'Produk'])

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">kelola Produk Perusahaan</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    {{-- <form action="{{ route('admin.category.index') }}" method="GET">
                        <div class="input-icon mb-3">
                            <input type="text" class="form-control" placeholder="Cari Data...." name="search"
                                value="">
                            <span class="input-icon-addon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z"></path>
                                    <circle cx="10" cy="10" r="7"></circle>
                                    <line x1="21" y1="21" x2="15" y2="15"></line>
                                </svg>
                            </span>
                        </div>
                    </form> --}}

                    <div class="card rounded-lg border border-0">
                        <div class="card-body p-0">
                            @if ($products->isEmpty())
                                <div class="text-center py-4">
                                    <p class="text-muted">Belum ada data produk.</p>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Gambar Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $i => $product)
                                                <tr>
                                                    <td>{{ $i + $products->firstItem() }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $product->thumbnail) }}"
                                                            alt="{{ $product->name }}" class="img-thumbnail"
                                                            style="width: 100px; height: auto;">
                                                    </td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modal-simple-{{ $product->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <path
                                                                    d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                <path
                                                                    d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                <path d="M16 5l3 3" />
                                                            </svg>Edit
                                                        </a>
                                                        <x-modal :id="$product->id" title="Edit - {{ $product->name }}">
                                                            <form action="{{ route('admin.product.update', $product->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-4">
                                                                    <label class="form-label"
                                                                        for="name-{{ $product->id }}">Nama Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name-{{ $product->id }}" name="name"
                                                                        placeholder="Masukkan nama produk"
                                                                        value="{{ $product->name }}">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label d-block">Gambar
                                                                        Produk</label>
                                                                    <div class="d-flex align-items-center mb-2">
                                                                        <img src="{{ asset('storage/' . $product->thumbnail) }}"
                                                                            alt="Current thumbnail"
                                                                            id="thumbnail-preview-{{ $product->id }}"
                                                                            class="img-thumbnail me-3"
                                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                                        <div>
                                                                            <label
                                                                                for="thumbnail-input-{{ $product->id }}"
                                                                                class="btn btn-outline-primary mb-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-upload"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" stroke-width="2"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                                        fill="none"></path>
                                                                                    <path
                                                                                        d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2">
                                                                                    </path>
                                                                                    <path d="M7 9l5 -5l5 5"></path>
                                                                                    <path d="M12 4l0 12"></path>
                                                                                </svg>
                                                                                Pilih Gambar Baru
                                                                            </label>
                                                                            <input type="file"
                                                                                class="form-control d-none" name="thumbnail"
                                                                                id="thumbnail-input-{{ $product->id }}"
                                                                                accept="image/*"
                                                                                onchange="previewImage(this, 'thumbnail-preview-{{ $product->id }}')">
                                                                            <div id="file-name-{{ $product->id }}"
                                                                                class="text-muted small">
                                                                                Tidak ada file yang dipilih
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <small class="text-muted">Unggah gambar dengan ukuran
                                                                        maksimal 2MB. Format yang diizinkan: JPG, JPEG,
                                                                        PNG.</small>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label"
                                                                        for="about-{{ $product->id }}">Tentang
                                                                        Produk</label>
                                                                    <textarea class="form-control" id="about-{{ $product->id }}" name="about" rows="4"
                                                                        placeholder="Deskripsikan produk Anda">{{ $product->about }}</textarea>
                                                                </div>
                                                                <div class="text-end">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="icon icon-tabler icon-tabler-device-floppy"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" stroke-width="2"
                                                                            stroke="currentColor" fill="none"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none"></path>
                                                                            <path
                                                                                d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2">
                                                                            </path>
                                                                            <path
                                                                                d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0">
                                                                            </path>
                                                                            <path d="M14 4l0 4l-6 0l0 -4"></path>
                                                                        </svg>
                                                                        Simpan Perubahan
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </x-modal>

                                                        <x-button-delete :id="$product->id" :url="route('admin.product.destroy', $product->id)" title="Hapus"
                                                            class="btn btn-danger btn-sm" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
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
            const fileNameElement = document.getElementById('file-name-' + input.id.split('-').pop());

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
                fileNameElement.textContent = input.files[0].name;
            } else {
                preview.src = "{{ asset('path/to/default/image.jpg') }}";
                fileNameElement.textContent = "Tidak ada file yang dipilih";
            }
        }
    </script>
@endpush
