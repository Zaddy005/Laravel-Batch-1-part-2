@extends('layouts.adminindex')
@section("caption","Cities List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12" >

            <form action="{{ route('cities.store') }}" method="POST" >
                {{ csrf_field() }}

                <div class="row align-items-end" >
                    <div class="col-md-6 form-group">
                        <label for="name"> Name <span class="text-danger" >*</span> </label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter Name" value="{{ old('name') }}" />
                    </div>

                    <div class="col-md-6 ">
                        <button type="reset" class="btn btn-secondary btn-sm rounded-0 ms-3">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Create</button>
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
                @foreach( $cities as $idx=>$city )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> {{ $city->name }} </td>
                        <td> {{ $city->user['name'] }} </td>
                        <td> {{ $city->created_at->format("d M Y") }} </td>
                        <td> {{ $city->updated_at->format("d M Y") }} </td>
                        <td>
                            <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{ $city->id }}" data-name="{{ $city->name }}" ><i class="fas fa-pen" ></i></a>
                            <a href="#" class="text-danger delete-btns" data-idx="{{ $city->name }}" ><i class="fas fa-trash" ></i></a>
                        </td>
                        <form id="formdelete-{{$city->name}}" action="/cities/{{$city->id}}" method="post" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
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
                    return false;
                }

            });
            // End Delete Form

            // Start Edit Form
            $(document).on("click",'.editform',function(e){
                // console.log($(this).attr('data-id'),$(this).data('name'));

                $('#editname').val($(this).data('name'));

                $getform = $('#formaction');
                $getform.attr('action',`cities/${$(this).data('id')}`);

                e.preventDefault();
            });
            // End Edit Form


        });

    </script>
@endsection

