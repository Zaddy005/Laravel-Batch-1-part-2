@extends('layouts.adminindex')
@section("caption","Create Students")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">


            <h1>Create Page</h1>


            <form action="/students/{{ $student->id }}" method="POST" >

                @csrf
                @method("put")

                <div class="row" >
                    <div class="col-md-4 form-group mb-3">
                        <label for="firstname">First Name <span class="text-danger" >*</span> </label>
                        <input type="text" name="firstname" id="firstname" class="form-control form-control-sm rounded-0" placeholder="Enter First Name" value="{{ $student->firstname }}" />
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="lastname"> Last Name <span class="text-danger" >*</span> </label>
                        <input type="text" name="lastname" id="lastname" class="form-control form-control-sm rounded-0" placeholder="Enter Last Name" value="{{ $student->lastname }}" />
                    </div>

                    <div class="col-md-4 form-group mb-3">
                        <label for="regnumber"> Register Number <span class="text-danger" >*</span> </label>
                        <input type="text" name="regnumber" id="regnumber" class="form-control form-control-sm rounded-0" placeholder="Enter Reg Number" value="{{ $student->regnumber }}" />
                    </div>

                    <div class="col-md-12 form-group mb-3">
                        <label for="remark"> Remark </label>
                        <textarea name="remark" id="remark" class="form-control rounded-0" rows="5" placeholder="Enter Remark..." > {{ $student->remark }} </textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm rounded-0 ">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Update</button>
                        </div>
                    </div>

                </div>
            </form>



        </div>
    </div>
    <!-- End Inner Content Area  -->

@endsection
