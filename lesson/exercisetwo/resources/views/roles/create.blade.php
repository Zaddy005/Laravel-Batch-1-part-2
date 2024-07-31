@extends('layouts.adminindex')
@section("caption","Create Role")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">


            <h1>Create Page</h1>


            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data" >

                @csrf

                <div class="row" >

                    <div class="col-md-4" >
                        <label for="image" class="gallery" ><span>Choose Images</span></label>
                    </div>

                    <div class="col-md-8" >

                        <div class="row" >

                            <div class="col-md-6 form-group mb-3">
                                <label for="image"> Image </label>
                                <input type="file" name="image" id="image" class="form-control form-control-sm rounded-0" placeholder="Image" />
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="name"> Name <span class="text-danger" >*</span> </label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter Role Name" value="{{ old('name') }}" />
                            </div>

                            <div class="col-md-6 form-group" >
                                <select class="form-control form-control-sm rounded-0" name="status_id" >
                                    <option selected disabled >Choose status</option>
                                    @foreach($statuses as $idx=>$status)
                                        <option value="{{$status->id}}" > {{$status->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 d-flex justify-content-end align-items-end">
                                <div class="">
                                    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm rounded-0 ">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Register</button>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </form>



        </div>
    </div>
    <!-- End Inner Content Area  -->

@endsection

@section('css')
    <style type="text/css">
        .gallery{
            width: 100%;
            height:100%;
            background-color: #eee;
            color: #aaa;

            display:flex;
            justify-content:center;
            align-items:center;

            text-align: center;
            padding: 10px;
        }


        .gallery.removetext span{
            display: none;
        }


        .gallery img{
            width: 100px;
            height: 100px;
            border:2px dashed #aaa;
            border-radius: 10px;
            object-fit: cover;

            padding: 5px;
            margin:0 5px;
        }
    </style>
@endsection

@section('script')

    <script type="text/javascript" >

        $(document).ready(function(){


            var previewimages = function(input,output){
                // console.log(input,output);

                if(input.files){

                    var totalfiles = input.files.length;
                    // console.log(totalfiles);

                    if(totalfiles > 0){
                        $(output).addClass("removetext");
                    }else{
                        $(output).removeClass("removetext");
                    }

                    for(var x=0; x < totalfiles; x++){
                        // console.log(x);

                        var filereader = new FileReader();
                        filereader.readAsDataURL(input.files[x]);

                        filereader.onload = function(e){
                            $(output).html('');
                            $($.parseHTML('<img>')).attr('src',e.target.result).appendTo(output);
                        }

                    }

                }


            }


            $("#image").change(function(){

                previewimages(this,"label.gallery");

            });


        });

    </script>

@endsection


{{-- 57:27cd --}}
