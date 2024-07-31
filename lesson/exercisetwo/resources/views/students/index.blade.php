@extends('layouts.adminindex')
@section("caption","Students List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="col-md-12 mb-3">
                <a href="{{ route("students.create") }}" class="btn btn-info text-light" > Create </a>
            </div>

            <hr/>

            <table class="table table-sm table-hover border mydata">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Reg Number</th>
                        <th>Name</th>
                        <th>Remark</th>
                        <th>Status</th>
                        <th>By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $students as $idx=>$student )
                        <tr>
                            <td> {{ ++$idx }} </td>
                            <td> <a href="{{ route("students.show",$student->id) }}" > {{ $student->regnumber }} </a> </td>
                            <td> {{ $student->firstname }} {{ $student->lastname }} </td>
                            <td> {{ Str::limit($student->remark,10) }} </td>
                            <td> {{ $student->status->name }} </td>
                            <td> {{ $student->user['name'] }} </td>
                            <td> {{ $student->created_at->format("d M Y") }} </td>
                            <td> {{ $student->updated_at->format("d M Y") }} </td>
                            <td>
                                <a href="{{ route("students.edit",$student->id) }}" class="text-info" ><i class="fas fa-pen" ></i></a>
                                <a href="#" class="text-danger delete-btns" data-idx="{{$student->regnumber}}" ><i class="fas fa-trash" ></i></a>
                            </td>
                            <form id="formdelete-{{$student->regnumber}}" action="{{ route('students.destroy',$student->id) }}" method="post" >
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
