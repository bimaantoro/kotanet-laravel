@extends('layouts.backend.master', ['title' => 'Tentang Perusahaan'])

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Kelola Informasi Perusahaan</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('admin.about.create') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Tambah Informasi Perusahaan
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
                    <div class="card rounded-lg border border-0">
                        <div class="card-body p-0">
                            @if ($abouts->isEmpty())
                                <div class="text-center py-4">
                                    <p class="text-muted">Belum ada data terbaru.</p>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Deskripsi Perusahaan</th>
                                                {{-- <th>Visi Perusahaan</th>
                                                <th>Misi Perusahaan</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($abouts as $i => $about)
                                                <tr>
                                                    <td>{{ $i + $abouts->firstItem() }}</td>
                                                    <td>{{ $about->description }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modal-simple-{{ $about->id }}">
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
                                                        <x-modal :id="$about->id" title="Edit Informasi Perusahaan">
                                                            <form action="{{ route('admin.about.update', $about->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-4">
                                                                    <label for="description"
                                                                        class="form-label fw-bold">Deskripsi
                                                                        Perusahaan</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="4" required
                                                                        placeholder="Masukkan deskripsi perusahaan Anda di sini...">{{ old('description', $about->description) }}</textarea>
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label class="form-label fw-bold">VISI</label>
                                                                    <p class="text-muted small">Edit poin-poin visi
                                                                        perusahaan Anda.</p>
                                                                    <div id="vision-key-points-container">
                                                                        @forelse($about->visionKeypoints as $visionKeypoint)
                                                                            <div class="input-group mb-2">
                                                                                <input type="text" class="form-control"
                                                                                    name="vision_keypoints[]" required
                                                                                    placeholder="Masukkan poin visi"
                                                                                    value="{{ $visionKeypoint->keypoint }}">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger remove-vision-key-point">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                                        <path stroke="none"
                                                                                            d="M0 0h24v24H0z"
                                                                                            fill="none" />
                                                                                        <path d="M4 7l16 0" />
                                                                                        <path d="M10 11l0 6" />
                                                                                        <path d="M14 11l0 6" />
                                                                                        <path
                                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                                        <path
                                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        @empty
                                                                            <div class="input-group mb-2">
                                                                                <input type="text" class="form-control"
                                                                                    name="vision_keypoints[]" required
                                                                                    placeholder="Masukkan poin visi">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger remove-vision-key-point">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                                        <path stroke="none"
                                                                                            d="M0 0h24v24H0z"
                                                                                            fill="none" />
                                                                                        <path d="M4 7l16 0" />
                                                                                        <path d="M10 11l0 6" />
                                                                                        <path d="M14 11l0 6" />
                                                                                        <path
                                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                                        <path
                                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        @endforelse
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary mt-2"
                                                                        id="add-vision-key-point">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M12 5l0 14" />
                                                                            <path d="M5 12l14 0" />
                                                                        </svg> Tambah Poin Visi
                                                                    </button>
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label class="form-label fw-bold">MISI</label>
                                                                    <p class="text-muted small">Edit poin-poin misi
                                                                        perusahaan Anda.</p>
                                                                    <div id="mission-key-points-container">
                                                                        @forelse($about->missionKeypoints as $missionKeypoint)
                                                                            <div class="input-group mb-2">
                                                                                <input type="text" class="form-control"
                                                                                    name="mission_keypoints[]" required
                                                                                    placeholder="Masukkan poin misi"
                                                                                    value="{{ $missionKeypoint->keypoint }}">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger remove-mission-key-point">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="24" height="24"
                                                                                        viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor"
                                                                                        stroke-width="2"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                                        <path stroke="none"
                                                                                            d="M0 0h24v24H0z"
                                                                                            fill="none" />
                                                                                        <path d="M4 7l16 0" />
                                                                                        <path d="M10 11l0 6" />
                                                                                        <path d="M14 11l0 6" />
                                                                                        <path
                                                                                            d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                                        <path
                                                                                            d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                                    </svg>
                                                                                </button>
                                                                            </div>
                                                                        @empty
                                                                            <div class="input-group mb-2">
                                                                                <input type="text" class="form-control"
                                                                                    name="mission_keypoints[]" required
                                                                                    placeholder="Masukkan poin misi">
                                                                                <button type="button"
                                                                                    class="btn btn-outline-danger remove-mission-key-point">
                                                                                    <i class="fas fa-trash-alt"></i>
                                                                                </button>
                                                                            </div>
                                                                        @endforelse
                                                                    </div>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary mt-2"
                                                                        id="add-mission-key-point">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M12 5l0 14" />
                                                                            <path d="M5 12l14 0" />
                                                                        </svg> Tambah Poin Misi
                                                                    </button>
                                                                </div>

                                                                <div class="text-end mt-4">
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

                                                        <x-button-delete :id="$about->id" :url="route('admin.about.destroy', $about->id)" title="Hapus"
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
        function addInputField(containerId, inputName, removeButtonClass, placeholder) {
            const container = document.getElementById(containerId);
            const newInput = document.createElement('div');
            newInput.classList.add('input-group', 'mb-2');
            newInput.innerHTML = `
        <input type="text" class="form-control" name="${inputName}[]" required placeholder="${placeholder}">
        <button type="button" class="btn btn-outline-danger ${removeButtonClass}">
             <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
        </button>
    `;
            container.appendChild(newInput);
        }

        document.getElementById('add-vision-key-point').addEventListener('click', function() {
            addInputField('vision-key-points-container', 'vision_keypoints', 'remove-vision-key-point',
                'Masukkan poin visi');
        });

        document.getElementById('add-mission-key-point').addEventListener('click', function() {
            addInputField('mission-key-points-container', 'mission_keypoints', 'remove-mission-key-point',
                'Masukkan poin misi');
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-vision-key-point') ||
                e.target.classList.contains('remove-mission-key-point') ||
                e.target.closest('.remove-vision-key-point') ||
                e.target.closest('.remove-mission-key-point')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>
@endpush
