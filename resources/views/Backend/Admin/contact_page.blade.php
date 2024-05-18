
@extends('Backend.Body.master')
@section('admin')

@section('title')
Exploredia | Contact Page
@endsection

 <!-- Page wrapper  -->
 <div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Contact Page</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('contact.page') }}" class="text-muted">Contact</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
        <!-- End Bread crumb and right sidebar toggle -->

        <!-- Container fluid  -->
        <div class="container-fluid">

    <!-- Start Page Content -->
    @if(session('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span>{{ session('message') }} </span>
            </div>
            @endif

    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!-- Column -->
            </div>

            <div class="col-12 align-self-center">

        </div>


<div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered no-wrap">
        <thead class="bg-warning text-white">
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created At</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($contactpage as $key => $item)

            <tr>

                <td>{{ $key+1 }}</td>
                <td>{{ $item->contact_name }}</td>
                <td>{{ $item->contact_email }}</td>
                <td>{{ $item->contact_phone }}</td>
                <td>{{ $item->contact_message }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                <td class="text-center">

                    <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#contact{{$item->id}}" data-toggle="tooltip"
                        data-placement="bottom" title="" data-original-title="Delete"><i class="fas fa-trash-alt"></i></button>

    <!-- Delete Modal -->
    <form method="post" action="{{ route('contact.delete', $item->id) }}" accept-charset="UTF-8" style="display:inline">
    @csrf
    @method('delete')

    <div class="modal fade" id="contact{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>Contact User Delete</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-left">Are You Sure Want To Delete ???</h5><br>
                <h6 class="text-left">{{$item->contact_name}}</h6><br>
                <h6 class="text-left">{{$item->contact_email}}</h6><br>
                <h6 class="text-left">{{$item->contact_phone}}</h6><br>
                <h6 class="text-left">{{$item->contact_message}}</h6><br>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
        </div>
    </div>

    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

                    </table>
                    {{ $contactpage->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
