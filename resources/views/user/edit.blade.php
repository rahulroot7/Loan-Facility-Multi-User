@extends('layouts.master')

@section('content')


<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit User Admin</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                        <form method="post" action="{{route('users.update',$user->id)}}" id="myform" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body pb-2">
                                <div class="row row-sm">
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="Enter User Name">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" value="{{ $user->email }}" class="form-control mb-4 @error('email') is-invalid @enderror" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" name="phone" value="{{ $user->phone }}" maxlength="10" class="form-control mb-4 @error('phone') is-invalid @enderror" oninput="validateInput(this)" placeholder="Enter Name">
                                            @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control mb-4 @error('full_name') is-invalid @enderror" placeholder="Enter User Name">
                                            @if ($errors->has('full_name'))
                                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Father Nmae</label>
                                            <input type="text" name="father_name" value="{{ $user->father_name }}" class="form-control mb-4 @error('father_name') is-invalid @enderror" placeholder="Enter Father name">
                                            @if ($errors->has('father_name'))
                                            <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg">
                                            <label class="form-label">Aadhar NUmber</label>
                                            <input type="text" name="aadhar_number" value="{{ $user->aadhar_number }}" class="form-control mb-4 @error('aadhar_number') is-invalid @enderror" oninput="validateInput(this)" maxlength="12" placeholder="Enter Aadhar NUmber">
                                            @if ($errors->has('aadhar_number'))
                                            <span class="text-danger">{{ $errors->first('aadhar_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Enter Address">{{ $user->address }}</textarea>
                                            @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Area</label>
                                            <textarea name="area" class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Enter Area">{{ $user->area }}</textarea>
                                            @if ($errors->has('area'))
                                            <span class="text-danger">{{ $errors->first('area') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row row-sm">
                                        <div class="col-lg">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" value="{{ old('password') }}" class="form-control mb-4 @error('password') is-invalid @enderror" placeholder="Enter Password">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg mg-t-10 mg-lg-t-0">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control mb-4 @error('confirm_password') is-invalid @enderror" placeholder="Enter Confirm password">
                                            @if ($errors->has('confirm_password'))
                                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-0 mt-4 row justify-content-end">
                                        <div class="col-md-9">
                                            <button type="submit" name="insert" value="insert" class="btn btn-primary">update</button>
                                            <button class="btn btn-secondary"><a href="#">Cancel</a></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- PAGE-HEADER END -->
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js" defer></script>
<script>
    $(function() {
        $("#myform").validate({
            rules: {
                name: {
                    required: true
                },
                full_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true
                }                

            },
            messages: {
                company_name: {
                    required: "The Name field is required."
                }
            }
        });
    });
</script>
@endsection