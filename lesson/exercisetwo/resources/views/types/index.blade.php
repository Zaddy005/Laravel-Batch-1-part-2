@extends('layouts.adminindex')
@section("caption","Types List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">

        <div class="col-md-12" >
            <form action="{{ route('types.store') }}" method="POST" >
                {{ csrf_field() }}

                <div class="row align-items-end" >
                    <div class="col-md-4 form-group">
                        <label for="name"> Name <span class="text-danger" >*</span> </label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter Name" value="{{ old('name') }}" />
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="status" >Status</label>
                        <select id="status" class="form-control form-control-sm rounded-0" name="status_id" >
                            <option selected disabled >Choose status</option>
                            @foreach($statuses as $idx=>$status)
                                <option value="{{ $status['id'] }}" > {{ $status['name'] }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <button type="reset" class="btn btn-secondary btn-sm rounded-0 ms-3">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Register</button>
                    </div>

                </div>
            </form>
        </div>

        <hr/>

        <div class="col-md-12">
            <table class="table table-sm table-hover border mydata">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $types as $idx=>$type )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> {{ $type->name }}</td>
                        <td> {{ $type->status['name'] }}</td>
                        <td> {{ $type->user['name'] }} </td>
                        <td> {{ $type->created_at->format('d M Y') }} </td>
                        <td> {{ $type->updated_at->format('d M Y') }} </td>
                        <td>
                            <a href="javascript:void(0);" class="text-info editform" data-bs-toggle="modal" data-bs-target="#editmodal" data-id="{{ $type->id }}" data-name="{{ $type->name }}" data-status="{{ $type->status_id }}" ><i class="fas fa-pen" ></i></a>
                            <a href="javascript:void(0);" class="text-danger delete-btns" data-idx="{{$type->name}}" ><i class="fas fa-trash" ></i></a>
                        </td>
                        <form id="formdelete-{{$type->name}}" action="{{ route('types.destroy',$type->id) }}" method="post" >
                            @csrf
                            @method('delete')
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
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content rounded-0" >
                <div class="modal-header" >
                    <h6 class="modal-title" >Edit Form</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" > x </button>
                </div>

                <div class="modal-body" >
                    <form id="formaction" action="" method="POST" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row align-items-end px-4" >
                            <div class="col-md-7 form-group">
                                <label for="editname"> Name <span class="text-danger" >*</span> </label>
                                <input type="text" name="name" id="editname" class="form-control form-control-sm rounded-0" placeholder="Enter Name" value="{{ old('name') }}" />
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="editstatus" >Status</label>
                                <select id="editstatus_id" class="form-control form-control-sm rounded-0 edit-selects" name="status_id" >
                                    @foreach($statuses as $idx=>$status)
                                        <option  value="{{ $status['id'] }}" > {{ $status['name'] }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
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
            $('.delete-btns').click(function(){
                var getreg = $(this).data('idx');

                if(confirm(`Are you sure !!! you want to delete ${getreg} ?`)){
                    $(`#formdelete-${getreg}`).submit();
                }else{
                    return false
                }

            });


            // Start Edit Form
            $(document).on("click",'.editform',function(e){

                $('#editname').val($(this).data('name'));
                $("#editstatus_id").val($(this).data('status'));

                $getform = $('#formaction');
                $getform.attr('action',`types/${$(this).data('id')}`);

                e.preventDefault();
            });
            // End Edit Form


        });

    </script>
@endsection
