@extends('layouts.master', ['title' => 'Tambah Informasi Perusahaan'])



@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card rounded-lg border-0">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Informasi Perusahaan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-bold required">Deskripsi
                                        Perusahaan</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required
                                        placeholder="Masukkan deskripsi perusahaan Anda di sini..."></textarea>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold required">VISI</label>
                                    <p class="text-muted small">Tambahkan poin-poin visi perusahaan Anda.</p>
                                    <div id="vision-key-points-container">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="vision_keypoints[]"
                                                placeholder="Masukkan poin visi" required>
                                            <button type="button" class="btn btn-outline-danger remove-vision-key-point">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary mt-2" id="add-vision-key-point">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>Tambah Poin Visi
                                    </button>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold required">MISI</label>
                                    <p class="text-muted small">Tambahkan poin-poin misi perusahaan Anda.</p>
                                    <div id="mission-key-points-container">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="mission_keypoints[]" required
                                                placeholder="Masukkan poin misi">
                                            <button type="button" class="btn btn-outline-danger remove-mission-key-point">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary mt-2" id="add-mission-key-point">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 5l0 14" />
                                            <path d="M5 12l14 0" />
                                        </svg>Tambah Poin Misi
                                    </button>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M5 12l6 6" />
                                            <path d="M5 12l6 -6" />
                                        </svg>Kembali
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
                                        </svg> Simpan
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
