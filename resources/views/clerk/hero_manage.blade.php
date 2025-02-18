@extends('clerk.master')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('clerk.dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Hero Section</li>
    </ol>
  </nav>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title"><h2><b>Hero Table</b></h2></div>
            <div class="form-group-sm text-right">
                <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal"
                    data-target="#addCollegeModal">
                    <i class="fa fa-plus"></i> Create Hero Section
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addCollegeModal" tabindex="-1" role="dialog"
                    aria-labelledby="addCollegeModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalCenterTitle"><b>Create Hero Section</b></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('hero.store') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Title</b></label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="title"
                                                name="title" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Description</b></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="4" cols="50"  id="description"
                                                name="description" value=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"><b>Image</b></label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="hero-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($heroes as $hero)
                    <tr>
                        <td>{{$hero->title}}</td>
                        <td>{{$hero->description}}</td>
                        <td class="text-center align-middle"> <img src="{{asset('upload/hero_image/'. $hero->image)}}" alt="" style="height: 100px; width: 100px;">
                        </td>
                        <td class="text-center align-middle">
                            <form action="{{route('hero.update' , $hero->id)}}" method="POST" class="heroForm" id="form1">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-link text-primary">
                                    @if($hero->status == '1')
                                        <i class="fa fa-toggle-on fa-2x"></i>
                                    @else
                                        <i class="fa fa-toggle-off fa-2x" style="color: rgb(241, 85, 85);"></i>
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
 document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.heroForm').forEach(form => {
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            const formElement = this; // Reference the form element
            const actionUrl = formElement.action; // Get the form's action URL

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to change the status of this hero?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: actionUrl,
                        method: 'POST',
                        data: {
                            _token: '{{csrf_token()}}',
                            _method: 'PUT'
                        },
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                    'Updated!',
                                    'The hero section status has been changed.',
                                    'success'
                                );

                                // Update the toggle icon dynamically
                                const icon = formElement.querySelector('i');

                                if (response.new_status === 1) {
                                    icon.classList.remove('fa-toggle-off', 'text-danger');
                                    icon.classList.add('fa-toggle-on', 'text-primary');
                                } else {
                                    icon.classList.remove('fa-toggle-on', 'text-primary');
                                    icon.classList.add('fa-toggle-off', 'text-danger');
                                }
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while updating the status.',
                                    'error'
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'An error occurred. Please try again later.',
                                'error'
                            );
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });
    });
});


        </script>
