@extends('layouts.master')

@section('content')

<div class="app-content">
    <div class="side-app">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add User Admin</h3>
                        </div>
                        <!-- show success and unsuccess message -->
                        @if (session('success'))
                        <p class="alert alert-success text-center">{{ session('success') }}</p>
                        @endif
                        @if (session('unsuccess'))
                        <p class="alert alert-danger text-center">{{ session('unsuccess') }}</p>
                        @endif
                        <!-- End show success and unsuccess message -->

                            <div class="card-body pb-2">
                                <!-- user list  -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>User Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile Number</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list-data">
                                                @php($count = 0)
                                                @foreach($user as $list)
                                                @php($count++)
                                                <tr>
                                                    <td>{{$count}}</td>
                                                    <td>{{$list->name}}</td>
                                                    <td>{{$list->email}}</td>
                                                    <td>{{$list->phone}}</td>
                                                    <td>
                                                        <label class="switch">
                                                        <input type="checkbox" class="status-toggle" data-id="{{$list->id}}" {{$list->status == '1' ? 'checked' : ''}}>
                                                        <span class="slider round"></span>
                                                    </label>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('users.view',$list->id) }}" class="btn btn-sm btn-primary" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                                        <a href="{{ route('users.edit',$list->id) }}" class="btn btn-sm btn-primary" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                                        <a href="{{ route('users.delete',$list->id) }}" class="btn btn-sm btn-secondary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end user list -->
                            </div>
                    </div>

                </div>
            </div>
        </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('.status-toggle').change(function() {
        var userId = $(this).data('id');
        var status = $(this).prop('checked') ? '1' : '0';
        $.ajax({
            url: '{{ route("users.updateStatus") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: userId,
                status: status
            },
            success: function(response) {
                if(response.success) {
                    alert('Status updated successfully');
                } else {
                    alert('Failed to update status');
                }
            },
            error: function() {
                alert('Error updating status');
            }
        });
    });
});
</script>
@endsection