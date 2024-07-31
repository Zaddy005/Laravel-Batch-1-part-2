@extends('layouts.adminindex')
@section("caption","Status List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12" >

            <form action="{{ route('statuses.store') }}" method="POST" >
                {{ csrf_field() }}

                <div class="row align-items-end" >
                    <div class="col-md-6 form-group">
                        <label for="name"> Name <span class="text-danger" >*</span> </label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter Name" value="{{ old('name') }}" />
                    </div>

                    <div class="col-md-6 ">
                        <button type="reset" class="btn btn-secondary btn-sm rounded-0 ms-3">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Register</button>
                    </div>

                </div>
            </form>

        </div>

        <hr/>

        <div class="col-md-12">

            <table class="table table-sm table-hover border ">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $statuses as $idx=>$status )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> {{ $status->name }} </td>
                        <td> {{ $status->user['name'] }} </td>
                        <td> {{ $status->created_at->format("d M Y") }} </td>
                        <td> {{ $status->updated_at->format("d M Y") }} </td>
                        <td>
                            <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{ $status->id }}" data-name="{{ $status->name }}" ><i class="fas fa-pen" ></i></a>
                            <a href="#" class="text-danger delete-btns" data-idx="{{ $idx }}" ><i class="fas fa-trash" ></i></a>
                        </td>
                        <form id="formdelete-{{$idx}}" action="/statuses/{{$status->id}}" method="post" >
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
    <!-- End Inner Content Area  -->

    <!-- Start Model Area -->

        <!-- start edit model -->
            <div id="editmodal" class="modal fade">
                <div class="modal-dialog modal-sm modal-dialog-centered" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <h6 class="modal-title" >Edit Form</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" > x </button>
                        </div>

                        <div class="modal-body" >
                            <form id="formaction" action="" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="row align-items-end" >
                                    <div class="col-md-8 form-group">
                                        <label for="editname"> Name <span class="text-danger" >*</span> </label>
                                        <input type="text" name="name" id="editname" class="form-control form-control-sm rounded-0" placeholder="Enter Name" value="{{ old('name') }}" />
                                    </div>

                                    <div class="col-md-4 ">
                                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3"> Update </button>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="modal-footer" ></div>
                    </div>
                </div>
            </div>
        <!-- end edit model -->

    <!-- End Model Area -->

@endsection

@section('script')
    <script type="text/javascript" >

        $(document).ready(function(){
            // Start Delete Form
            $('.delete-btns').click(function(){
                var getreg = $(this).data('idx');

                if(confirm(`Are you sure !!! you want to delete ${getreg} ?`)){
                    $(`#formdelete-${getreg}`).submit();
                }else{
                    return false
                }

            });
            // End Delete Form

            // Start Edit Form
            $(document).on("click",'.editform',function(e){
                // console.log($(this).attr('data-id'),$(this).data('name'));

                $('#editname').val($(this).data('name'));

                $getform = $('#formaction');
                $getform.attr('action',`statuses/${$(this).data('id')}`);

                e.preventDefault();
            });
            // End Edit Form


        });

    </script>
@endsection

