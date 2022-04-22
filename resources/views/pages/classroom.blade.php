@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-12  mt-3 ml-3 mr-3">
                <a href="#" class="btn btn-success mb-4" id="create-new-classroom">Add Classroom</a>
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody id="classrooms-crud">
                        @foreach ($classrooms as $u_info)
                            <tr id="classroom_id_{{ $u_info->id }}">
                                <td>{{ $u_info->id }}</td>
                                <td>{{ $u_info->name }}</td>
                                <td><a href="#" id="edit-classroom" data-id="{{ $u_info->id }}"
                                        data-name="{{ $u_info->name }}" class="btn btn-info">Edit</a></td>
                                <td>
                                    <a href="#" id="delete-classroom" data-id="{{ $u_info->id }}"
                                        class="btn btn-danger delete-classroom">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $classrooms->links() }}
            </div>
        </div>
    </div>



    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="classroomCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="classroomForm" name="classroomForm" class="form-horizontal">
                        <input type="hidden" name="classroom_id" id="classroom_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                                    value="" maxlength="50" required="">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                                    value="" required="">
                            </div>
                        </div> --}}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="create">Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
