@extends('layouts.adminindex')
@section("caption","Roles List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="col-md-12 mb-3">
                <a href="{{ route("roles.create") }}" class="btn btn-info text-light" > Create </a>
            </div>

            <hr/>

            <table class="table table-sm table-hover border mydata">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $roles as $idx=>$role )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td>
                            <img src="{{ asset($role->image) }}" class="rounded-circle" alt="{{ $role->name }}" width="20px" height="20px" />
                        </td>
                        <td>
                            <a href="{{ route('roles.show',$role->id) }}" >
                                {{ $role->name }}
                            </a>
                        </td>
                        <td>{{ $role->status['name'] }}</td>
                        <td> {{ $role->user['name'] }} </td>
                        <td> {{ $role->created_at->format('d M Y') }} </td>
                        <td> {{ $role->updated_at->format('d M Y') }} </td>
                        <td>
                            <a href="{{ route("roles.edit",$role->id) }}" class="text-info" ><i class="fas fa-pen" ></i></a>
                            <a href="#" class="text-danger delete-btns" data-idx="{{$role->name}}" ><i class="fas fa-trash" ></i></a>
                        </td>
                        <form id="formdelete-{{$role->name}}" action="{{ route('roles.destroy',$role->id) }}" method="post" >
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
        });

    </script>
@endsection
