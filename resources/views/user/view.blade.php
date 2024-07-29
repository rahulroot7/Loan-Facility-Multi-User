@extends('layouts.master')

@section('content')
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <!-- Row -->
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Applicant Details</h3>
                        <a href="{{ route('users.index') }}" class="btn btn-success btn-icon text-white">
                            <i class="fe fe-log-in"></i> Back
                        </a>
                    </div>

                    <div class="card mt-4 border-primary shadow-sm">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">User Name</h5>
                                    <h6 class="text-dark">{{@$user->name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Email</h5>
                                    <h6 class="text-dark">{{@$user->email}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Mobile Number</h5>
                                    <h6 class="text-dark">{{@$user->phone}}</h6>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Full Name</h5>
                                    <h6 class="text-dark">{{@$user->full_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Father Name</h5>
                                    <h6 class="text-dark">{{@$user->father_name}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Aadhar Number</h5>
                                    <h6 class="text-dark">{{@$user->aadhar_number}}</h6>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Address</h5>
                                    <h6 class="text-dark">{{@$user->address}}</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h5 class="text-secondary">Area</h5>
                                    <h6 class="text-dark">{{@$user->area}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- PAGE-HEADER END -->
    </div>
</div>
@endsection
