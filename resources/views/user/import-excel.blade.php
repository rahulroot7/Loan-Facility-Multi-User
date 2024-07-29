@extends('layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <!-- Row -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applicant Details</h3>
                        <div class="ms-auto pageheader-btn">
                            <a href="{{ route('users.index') }}" class="btn btn-success btn-icon text-white">
                                <span>
                                    <i class="fe fe-log-in"></i>
                                </span> Back
                            </a>
                        </div>
                    </div>
                    
                    <!-- Show success and error messages -->
                    @if (count($errors) > 0)
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert alert-danger alert-dismissible">
                                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                @foreach($errors->all() as $error)
                                {{ $error }} <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (session('success'))
                    <p class="alert alert-success text-center">{{ session('success') }}</p>
                    @endif

                    @if (session('unsuccess'))
                    <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                    @endif
                    <!-- End show success and error messages -->
                    
                    <div class="card-body">
                        <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customFile" class="form-label">Upload Excel Sheet</label>
                                        <input type="file" name="file" class="form-control-file" id="customFile"><br>
                                        <b><a href="{{asset('assets/template/user id.xlsx')}}">Download Template</a></b>
                                        @if ($errors->has('file'))
                                        <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Import Users</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- PAGE-HEADER END -->
    </div>
</div>

@endsection
