@extends('layouts.adminindex')
@section("caption","Post List")
@section('content')

    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="col-md-12 mb-3">
                <a href="{{ route("posts.create") }}" class="btn btn-info text-light" > Create </a>
            </div>

            <hr/>

            <table class="table table-sm table-hover border mydata">
                <thead>
                <tr>
                    <th>No</th>
                    <th>title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Fee</th>
                    <th>Type</th>
                    <th>Tag</th>
                    <th>Att Form</th>
                    <th>Status</th>
                    <th>By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $posts as $idx=>$post )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td>
                            <img src="{{ asset($post->image) }}" class="rounded-circle" alt="{{ $post->title }}" width="20px" height="20px" />
                            <a href="{{ route('posts.show',$post->id) }}" >
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->startdate }}</td>
                        <td>{{ $post->enddate }}</td>
                        <td>{{ $post->starttime }}</td>
                        <td>{{ $post->endtime }}</td>
                        <td>{{ $post->fee }}</td>
                        <td>{{ $post->type['name'] }}</td>
                        <td>{{ $post->tag['name'] }}</td>
                        <td>{{ $post->status['name'] }}</td>
                        <td>{{ $post->status['name'] }}</td>
                        <td> {{ $post->user['name'] }} </td>
                        <td> {{ $post->created_at->format('d M Y') }} </td>
                        <td> {{ $post->updated_at->format('d M Y') }} </td>
                        <td>
                            <a href="{{ route("posts.edit",$post->id) }}" class="text-info" ><i class="fas fa-pen" ></i></a>
                            <a href="#" class="text-danger delete-btns" data-idx="{{$post->title}}" ><i class="fas fa-trash" ></i></a>
                        </td>
                        <form id="formdelete-{{$post->title}}" action="{{ route('posts.destroy',$post->id) }}" method="post" >
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
