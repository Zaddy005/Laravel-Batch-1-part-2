@extends('layouts.adminindex')
@section("caption","Create Post")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">
            <form action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row" >

                    <div class="col-md-4" >

                        <div class="row" >

                            <div class="col-md-12 mb-3" >
                                <label for="image" class="gallery" >
                                    @if($post->image)
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" />
                                    @else
                                        <span>Choose Images</span>
                                    @endif
                                </label>
                                <input type="file" name="image" id="image" class="form-control " hidden />
                            </div>

                            <div class="col-md-6 mb-2" >
                                <label for="startdate" > Start Date <span class="text-danger" >*</span> </label>
                                <input type="date" name="startdate" id="startdate" class="form-control rounded-0" value="{{ $post->startdate }}" />
                            </div>

                            <div class="col-md-6 mb-2" >
                                <label for="enddate" > End Date <span class="text-danger" >*</span> </label>
                                <input type="date" name="enddate" id="enddate" class="form-control rounded-0" value="{{ $post->enddate }}" />
                            </div>

                            <div class="col-md-6 mb-2" >
                                <label for="starttime" > Start Time <span class="text-danger" >*</span> </label>
                                <input type="time" name="starttime" id="starttime" class="form-control rounded-0" value="{{$post->starttime}}" />
                            </div>

                            <div class="col-md-6 mb-2" >
                                <label for="endtime" > End Time <span class="text-danger" >*</span> </label>
                                <input type="time" name="endtime" id="endtime" class="form-control rounded-0" value="{{$post->endtime}}" />
                            </div>


                        </div>

                    </div>

                    <div class="col-md-8" >

                        <div class="row" >

                            <div class="col-md-12 form-group mb-3">
                                <label for="title"> Title <span class="text-danger" >*</span> </label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" placeholder="Enter Post Title" value="{{ $post->title }}" />
                            </div>

                            <div class="col-md-6 mb-3" >
                                <label for="type" >Type <span class="text-danger" > * </span></label>
                                <select id="type" class="form-control form-control-sm rounded-0" name="type_id" >
                                    <option selected disabled >Choose Type</option>
                                    @foreach($types as $idx=>$type)
                                        @if($post->type_id === $type->id)
                                            <option value="{{ $type->id }}" selected > {{ $type->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" >
                                <label for="fee" >Fee <span class="text-danger" > * </span></label>
                                <input type="number" name="fee" id="fee" class="form-control form-control-sm rounded-0" value="{{ $post->fee }}" />
                            </div>

                            <div class="col-md-12 mb-3" >
                                <label for="content" >Content <span class="text-danger" > * </span></label>
                                <textarea rows="4" name="content" id="content" class="form-control rounded-0" >{{ $post->content }}</textarea>
                            </div>

                            <div class="col-md-3" >
                                <label for="tag" >Tags <span class="text-danger" > * </span></label>
                                <select name="tag_id" id="tag" class="form-control form-control-sm rounded-0" >
                                    <option selected disabled >Choose Tags</option>
                                    @foreach($tags as $idx=>$tag)
                                        @if($post->tag_id === $tag->id)
                                            <option value="{{ $tag->id }}" selected > {{ $tag->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 form-group" >
                                <label for="attshow" >Attshow <span class="text-danger" > * </span></label>
                                <select name="attshow" id="attshow" class="form-control form-control-sm rounded-0"  >
                                    <option selected disabled >Choose status</option>
                                    @foreach($attshows as $idx=>$attshow)
                                        @if($post->attshow === $attshow->id)
                                            <option value="{{$attshow->id}}" selected > {{$attshow->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 form-group" >
                                <label for="status" >Status <span class="text-danger" > * </span></label>
                                <select name="status_id" id="status" class="form-control form-control-sm rounded-0"  >
                                    <option selected disabled >Choose status</option>
                                    @foreach($statuses as $idx=>$status)
                                        @if($post->status_id === $status->id)
                                            <option value="{{$status->id}}" selected > {{$status->name}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 d-flex justify-content-end align-items-end">
                                <div class="">
                                    <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm rounded-0 ">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Update</button>
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
            height:120px;
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

            let img = $("#image").attr("value");

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


