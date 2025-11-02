@extends('layouts.app')

@section('title', 'Admin Profile')
@section('page_title', 'Admin Profile')

@section('content')

    <div class="container-fluid py-4">
        {{-- PAGE HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-light"><i class="fas fa-user-cog me-2"></i>Admin Profile</h2>
            <button class="btn btn-outline-light rounded-pill" id="editProfileBtn">
                <i class="fas fa-edit me-2"></i>Edit Profile
            </button>
        </div>

        <div class="row g-4">
            {{-- LEFT SIDE PROFILE CARD --}}
            <div class="col-lg-4">
                <div class="card bg-dark text-white border-light shadow-lg rounded-4 text-center p-4">
                    <img src="{{ asset('manager/img/user.jpg') }}"
                        class="rounded-circle mx-auto mb-3 border border-3 border-primary"
                        style="width: 120px; height: 120px;" alt="Admin">
                    <h4 class="fw-bold">Muhammad Imran</h4>
                    <p class="text-secondary mb-1">Administrator</p>
                    <p class="text-muted">Icon Construction Company</p>

                    <hr class="border-light">

                    <div class="d-flex justify-content-around text-center mt-3">
                        <div>
                            <h5 class="fw-bold text-primary">12</h5>
                            <p class="small text-secondary">Projects</p>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary">8</h5>
                            <p class="small text-secondary">Ongoing</p>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary">4</h5>
                            <p class="small text-secondary">Completed</p>
                        </div>
                    </div>

                    <hr class="border-light">

                    <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-outline-info btn-sm rounded-pill"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill"><i
                                class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-success btn-sm rounded-pill"><i
                                class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE DETAILS FORM --}}
            <div class="col-lg-8">
                <div class="card bg-dark text-white border-light shadow-lg rounded-4 p-4">
                    <h4 class="fw-bold mb-3 text-primary"><i class="fas fa-id-card me-2"></i>Personal Information</h4>
                    <form id="profileForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="fullName" class="form-label text-secondary">Full Name</label>
                                <input type="text" id="fullName"
                                    class="form-control bg-dark text-white border-secondary" value="Muhammad Imran"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label text-secondary">Email Address</label>
                                <input type="email" id="email"
                                    class="form-control bg-dark text-white border-secondary"
                                    value="admin@iconconstruction.com" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label text-secondary">Phone Number</label>
                                <input type="text" id="phone"
                                    class="form-control bg-dark text-white border-secondary" value="+92 300 1234567"
                                    readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label text-secondary">Role</label>
                                <input type="text" id="role"
                                    class="form-control bg-dark text-white border-secondary" value="System Administrator"
                                    readonly>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label text-secondary">Office Address</label>
                            <input type="text" id="address" class="form-control bg-dark text-white border-secondary"
                                value="Main Office, Karachi, Pakistan" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="about" class="form-label text-secondary">About</label>
                            <textarea id="about" class="form-control bg-dark text-white border-secondary" rows="3" readonly>Responsible for overseeing project operations, managing resources, and ensuring timely delivery of all construction works.</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-outline-secondary rounded-pill" id="cancelEditBtn"
                                hidden>Cancel</button>
                            <button type="submit" class="btn btn-primary rounded-pill" hidden id="saveProfileBtn">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- JS SCRIPT --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Enable Edit Mode $('#editProfileBtn').on('click', function() { $('#profileForm input, #profileForm textarea').removeAttr('readonly'); $('#saveProfileBtn, #cancelEditBtn').removeAttr('hidden'); $(this).attr('hidden', true); }); // Cancel Edit $('#cancelEditBtn').on('click', function() { $('#profileForm input, #profileForm textarea').attr('readonly', true); $('#saveProfileBtn, #cancelEditBtn').attr('hidden', true); $('#editProfileBtn').removeAttr('hidden'); }); // Save Profile (Demo) $('#profileForm').on('submit', function(e) { e.preventDefault(); alert('✅ Profile Updated Successfully!'); $('#profileForm input, #profileForm textarea').attr('readonly', true); $('#saveProfileBtn, #cancelEditBtn').attr('hidden', true); $('#editProfileBtn').removeAttr('hidden'); }); 
    </script>

    {{-- FOOTER --}}

    <div class="container-fluid pt-4 px-4">
        <div class="bg-dark rounded-top p-4 border-top border-light">
            <div class="row text-center">
                <div class="col-12 col-sm-6 text-sm-start text-light"> &copy; <a href="#"
                        class="text-decoration-none text-primary">Icon Construction's</a>, All Rights Reserved. </div>
                <div class="col-12 col-sm-6 text-sm-end text-secondary"> Designed By G M Software Solution </div>
            </div>
        </div>
</div> @endsection
