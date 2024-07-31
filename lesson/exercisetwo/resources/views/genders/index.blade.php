@extends('layouts.adminindex')
@section('caption','Genders Page')
@section('content')
    <!-- Start Content Area -->
    <div class="container-fluid" >
        <form action="{{ route('genders.store') }}" method="POST" >
            @csrf

            <div class="row align-items-end">
                <div class="col-md-6 form-group" >
                    <label for="name" >Gender <span class="text-danger" > * </span> </label>
                    <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Enter Gender" value="{{ old('name') }}" />
                </div>

                <div class="col-md-6 " >
                    <button type="reset" class="btn btn-secondary btn-sm rounded-0 mx-1" >Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm rounded-0 mx-1" >Create</button>
                </div>
            </div>

        </form>

        <hr/>

        <table class="table border" >
            <thead>
                <tr>
                    <th> No </th>
                    <th> Name </th>
                    <th> By </th>
                    <th> Created At </th>
                    <th> Updated At </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>
                @foreach($genders as $idx=>$gender)
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> {{ $gender->name }} </td>
                        <td> {{ $gender->user['name'] }} </td>
                        <td> {{ $gender->created_at->format('d M Y') }} </td>
                        <td> {{ $gender->updated_at->format("d M Y") }} </td>
                        <td>
                            <a href="javascript:void(0);" class="text-info editform" data-bs-target="#editmodal" data-bs-toggle="modal" data-idx="{{ $gender->id }}" data-name="{{ $gender->name }}" > <i class="fas fa-pen" ></i> </a>
                            <a href="javascript:void(0);" class="text-danger deleteform" data-name="{{ $gender->name }}" > <i class="fas fa-trash" ></i> </a>
                        </td>
                        <form id="deleteform-{{ $gender->name }}" action="genders/{{$gender->id}}" method="post" >
                            @csrf
                            @method('delete')
                        </form>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    <!-- End Content Area -->

    <!-- Start Modal Area -->
        <!-- Start Edit Modal -->
        <div id="editmodal" class="modal" >
            <div class="modal-dialog modal-sm modal-dialog-centered" >
                <div class="modal-content" >

                    <div class="modal-header" >
                        <h6 class="modal-title" >Edit Form</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" > x </button>
                    </div>

                    <div class="modal-body" >
                        <form id="editform" action="" method="POST" >
                            @csrf
                            @method('put')

                            <div class="row align-items-end" >
                                <div class="col-md-8" >
                                    <label for="editname" >Gender <span class="text-danger" > * </span> </label>
                                    <input type="text" name="name" id="editname" class="form-control form-control-sm rounded-0" placeholder="Enter Gender" />
                                </div>
                                <div class="col-md-4" >
                                    <button class="btn btn-primary btn-sm rounded-0" >Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer" ></div>

                </div>
            </div>
        </div>
        <!-- End Edit Modal -->
        <!--  -->
    <!-- End Modal Area -->

@endsection

@section('script')

    <script type="text/javascript" >

        $(document).ready(function(){

            <!-- Start Edit Modal -->
            $('.editform').click(function (e){

               $("#editname").val( $(this).data('name') );
               $('#editform').attr('action',`genders/${ $(this).data('idx') }`);

               e.preventDefault();
            });
            <!-- End Edit Modal -->

            <!-- Start Delete Gender -->
            $('.deleteform').click(function(){
                let getname = this.getAttribute('data-name');

                if(confirm(`Are you sure !!! you want to delete ${getname}` )){
                    $(`#deleteform-${getname}`).submit();
                }else{
                    return false;
                }

            });
            <!-- End Delete Gender -->

        });

    </script>

@endsection
