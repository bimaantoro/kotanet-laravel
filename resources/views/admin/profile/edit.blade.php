@extends('layouts.backend.master', ['title' => 'Kelola Akun'])
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <h2 class="page-title">Pengaturan Akun</h2>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                @include('admin.profile._update-profile-information-form')

                @include('admin.profile._update-password-form')

                @include('admin.profile._delete-user-form')
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteAccountForm = document.getElementById('deleteAccountForm');
            const confirmDeleteAccountButton = document.getElementById('confirmDeleteAccount');

            confirmDeleteAccountButton.addEventListener('click', function() {
                deleteAccountForm.submit();
            });
        });
    </script>
@endpush
