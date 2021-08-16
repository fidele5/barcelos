@extends('layouts.app')

@section('content')
            <div class="container-fluid">
                <div class="row">
                        <div class="col-12">
                            <div class="card mb-4 rounded-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="{{route('savePermission')}}" method="post" role="form">
                                            @csrf
                                        <table class="table table-bordered table-hover font-14">
                                            <thead>
                                                <tr>
                                                    <th class="pl-4">Permission</th>
                                                    @foreach($roles as $role)
                                                        <th class="text-center">{!! ucwords(str_replace("_", " ", $role->name)) !!}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($permissions as $permission)
                                                <tr>
                                                    <td class="pl-4">{!! ucwords(str_replace("_", " ", $permission->name)) !!}</td>
                                                    @foreach($roles as $role)
                                                        <td class="text-center">
                                                            <input id="checkbox" type="checkbox"
                                                                name="permission[{!!$role->id!!}][{!!$permission->id!!}]"
                                                                value='1' {!! (in_array($role->id.'-'.$permission->id, $permissionRole)) ? 'checked' : '' !!} >
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                            <button type="submit" class="btn btn-primary btn-block">Save Permission</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- // Basic Floating Label Form section end -->
@endsection
