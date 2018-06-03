@extends('layouts.admin')

@php
    $pageTitle = isset($user)?'Edit User':'Add User';
@endphp

@section('pageTitle', $pageTitle)

@section('headIncludes')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        {{$pageTitle}}
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid" id="app">
            <form role="form" method="post"
                  action="{{isset($user)?route('users.update',$user->id):route('users.store')}}  "
                  enctype=multipart/form-data>
                @if(isset($user))
                    {{ method_field("PUT") }}
                @endif

                @csrf

                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-body row">
                                @include('includes.flash_messages')
                                <div class="col-md-12 px-5">
                                    <h3>Basic info</h3>
                                    <hr style="border: 1px solid #525793;">
                                </div>
                                <div class="col-md-6 p-5">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Name"
                                               value="{{isset($user)?$user->name:''}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required
                                               placeholder="Enter email"
                                               value="{{isset($user)?$user->email:''}}"
                                                {{isset($user)?'disabled':''}}>
                                    </div>
                                </div>
                                <div class="col-md-6 p-5">
                                    <div class="form-group">
                                        <label for="email">Role</label>
                                        <select name="role_id" id="role_id" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{((isset($user) && $user->role_id == $role->id) || (!isset($user) && $role->name == 'student'))?'selected':''}}>{{$role->label}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Phone number"
                                               value="{{isset($user)?$user->phone:''}}">
                                    </div>
                                </div>

                                @if(!isset($user))
                                    <div class="col-md-12 px-5 mt-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="send_email">
                                            <label class="form-check-label" for="send_email">Send welcome/registration email</label>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-12 px-5 mt-3">--}}
                                    {{--</div>--}}
                                    <div class="col-md-12 px-5 mt-3" id="email_form" style="display: none">
                                        <hr style="border: 1px solid #525793;">
                                        <h3>Custom notification email</h3>
                                        <p>You can specify a custom email, if you want to override the default one.</p>
                                        <div class="form-group">
                                            <label for="venues_with_admin_rights">Email title</label>
                                            <input type="text" class="form-control" id="email_title" name="email_title"
                                                   placeholder="Email title">
                                        </div>
                                        <div class="form-group">
                                            <label for="venues_with_admin_rights">Email body</label>
                                            <div>
                                                <small>You can use the tag <code>%%registration_link%%</code> to include
                                                    the
                                                    registration link. It will automatically be replaced with the
                                                    correct url
                                                </small>
                                            </div>
                                            <textarea class="form-control" name="email_body"
                                                      id="email_body"
                                                      cols="30" rows="10"></textarea>
                                        </div>

                                    </div>
                                @endif

                                <div class="col-md-12 px-5 mt-3 text-right">
                                    <a href="{{route('users.index')}}" class="mr-2 text-dark">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </form>
        </div>
    </div>
@endsection


@section('footerIncludes')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        @if(!isset($user))
            $("#send_email").change(function(){
                if ($(this).is(":checked")){
                    $('#email_form').show();
                }else{
                    $('#email_form').hide();
                }
        });
        @endif
    </script>
@endsection