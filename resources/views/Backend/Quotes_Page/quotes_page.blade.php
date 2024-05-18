@extends('Backend.Body.master')
@section('admin')

@section('title')
Exploredia | Quotes Dashboard
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Page wrapper  -->
        <div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Quotes Main Page</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Quotes Page</a></li>
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

        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="p-2 bg-cyan text-center">
                                        <h1 class="font-light text-white" class="num" data-val="{{ $numberQuotes }}">{{ $numberQuotes }}</h1>
                                        <h6 class="text-white">Best Quotes Data</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                </div>

            <div class="col-12 align-self-center">
                <div class="customize-input float-right">

           <!-- Add Button trigger modal -->
<button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-toggle="modal" data-target="#addQuotes">
    <i class="fas fa-chess-queen" aria-hidden="true"></i>&nbsp;  Add On Quotes</button>

    <form method="POST" action="{{ route('quotes.store') }}" class="forms-sample" enctype="multipart/form-data">
        @csrf

<div class="modal fade" id="addQuotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add Quotes</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h6 class="card-title">Quotes Image :</h6>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="quotes_image" id="image">
                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        @if($errors->has('quotes_image'))
                              <span class="text-danger">{{ $errors->first('quotes_image') }}</span>
                            @endif
                    </div>

                    <br>
                    <h6 class="card-title"></h6>
                    <div class="custom-file">
                        <img id="showImage" src="{{ url('images/admin.png') }}"
                        alt="quotes_image"  class="rounded-circle" width="100" height="100">
                    </div>
                    <br><br><br>

        <br>
            <h6 class="card-title">Motivational Quotes :</h6>
            <div class="form-group">
                <textarea class="form-control" rows="3" name="quotes_description">"       "</textarea>
                @if($errors->has('quotes_description'))
                    <span class="text-danger">{{ $errors->first('quotes_description') }}</span>
                 @endif
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light"
            data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Data</button>
    </div>
    </div>
  </div>
</div>

</form>
</div>
</div>
            <br>
            <br>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Quotes Image</th>
                                <th>Motivation Quotes</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($quotes as $key => $item)

                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center"><img src="{{ (!empty($item->quotes_image)) ? url('Images/Quotes_Page/'.$item->quotes_image) : url('Images/admin.png') }}"
                                height="100px;" width="100;"></td>
                                <td>{{ $item->quotes_description }}</td>
                                <td class="text-center">

                                    <a href="{{ route('quotes.edit',$item->id) }}" class="btn btn-warning btn-circle" data-toggle="tooltip"
                                        data-placement="bottom" title="" data-original-title="Edit"><i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{ route('quotes.show',$item->id) }}" class="btn btn-success btn-circle" data-toggle="tooltip"
                                            data-placement="bottom" title="" data-original-title="View"><i class="fas fa-eye"></i>
                                        </a>

                                <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteQuotes{{$item->id}}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

     <!-- Delete Quotes -->
     <form method="post" action="{{ route('quotes.delete', $item->id) }}" accept-charset="UTF-8" style="display:inline">
        @csrf
        @method('delete')

        <div class="modal fade" id="deleteQuotes{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Quotes Delete</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-left">Are You Sure Want To Delete <b>{{$item->quotes_description}}</b> ???</h5>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
            </div>
        </div>

        </form>
        <!-- END Delete Quotes -->

                            </td>
                            </tr>

                            @endforeach

                        </tbody>

                            </table>
                            {{ $quotes->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <!-- End Container fluid  -->

            <script type="text/javascript">
                $(document).ready(function(){
                    $('#image').change(function(e){
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('#showImage').attr('src',e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    });
                });
                </script>

<!-- Number Count  -->
<script>
    let valueDisplays = document.querySelectorAll(".num");
    let interval = 4000;

    valueDisplays.forEach((valueDisplay) => {
      let startValue = 0;
      let endValue = parseInt(valueDisplay.getAttribute("data-val"));
      let duration = Math.floor(interval / endValue);
      let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
          clearInterval(counter);
        }
      }, duration);
    });
    </script>

@endsection
