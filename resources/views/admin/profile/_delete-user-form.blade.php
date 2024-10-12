<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Hapus Akun</h3>
        </div>
        <div class="card-body">
            <p class="text-muted">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.
            </p>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                Hapus Akun
            </button>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah Anda yakin ingin menghapus akun?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Masukkan kata
                    sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.</p>
                <form action="{{ route('admin.profile.destroy') }}" method="POST" id="deleteAccountForm">
                    @csrf
                    @method('DELETE')
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteAccount" data-bs-dismiss="modal">Hapus
                    Akun</button>
            </div>
        </div>
    </div>
</div>
