@extends('layouts.adminindex')
@section("caption","Role Show")
@section('content')


    <!-- Start Inner Content Area  -->
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="{{ route("roles.index") }}" class="btn btn-secondary text-light" > Close </a>

            <hr/>

            <div class="row" >
                <div class="col-md-4" >

                    <div class="card rounded-0" >
                        <div class="card-body" >
                            <h5 class="card-title" > {{ $role->name }} | <span class="text-muted" > {{ $role->status->name }} </span> </h5>
                        </div>

                        <ul class="list-group text-center" >
                            <li class="list-group-item" >
                                <img src="{{ asset($role->image) }}" class="" alt="{{ $role->name }}" width="200px" height="200px" />
                            </li>
                        </ul>

                        <div class="card-body" >
                            <div class="row" >
                                <div class="col-md-6" >
                                    <i class="fas fa-user fa-sm" ></i> <span> {{ $role['user']['name'] }} </span>
                                </div>
                                <br/>
                                <div class="col-md-6" >
                                    <i class="fas fa-calendar fa-sm" ></i> <span> {{ date('d M Y',strtotime($role->created_at)) }} | {{ date("h:i:s A",strtotime($role->updated_at)) }} </span>
                                    <br/>
                                    <i class="fas fa-edit fa-sm" ></i> <span> {{ date("d M Y | h:i:s A",strtotime($role->updated_at)) }} </span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="col-md-8" >

                    <div class="card-box rounded-0" >

                        <ul class="list-group text-center" >
                            <li class="list-group-item active rounded-0" >Information</li>
                        </ul>

                        <!-- Start remark -->
                        <table class="table table-sm table-border" >
                            <thead>
                            <tr>
                                <th> Remark here </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td> Nothing to Show </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- End remark -->

                    </div>

                </div>

            </div>






        </div>
    </div>
    <!-- End Inner Content Area  -->

@endsection
