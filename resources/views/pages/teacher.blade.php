@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row ">

            <div class="col-12  mt-3 ml-3 mr-3">
                <a href="#" class="btn btn-success mb-4" id="create-new-teacher">Add Teacher</a>
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name and Surname</th>
                            <th>Email</th>
                            <th>Name</th>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody id="teachers-crud">
                        @foreach ($teachers as $u_info)
                            <tr id="teacher_id_{{ $u_info->id }}">
                                <td>{{ $u_info->id }}</td>
                                <td>{{ $u_info->name }} {{ $u_info->surname }}</td>
                                <td>{{ $u_info->email }}</td>
                                <td>{{ $u_info->phone_number }}</td>
                                <td><a href="#" id="edit-teacher" data-id="{{ $u_info->id }}"
                                        data-name="{{ $u_info->name }}" data-surname="{{ $u_info->surname }}"
                                        data-email="{{ $u_info->email }}"
                                        data-phone_number="{{ $u_info->phone_number }}" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="#" id="delete-teacher" data-id="{{ $u_info->id }}"
                                        class="btn btn-danger delete-teacher">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $teachers->links() }}
            </div>
        </div>
    </div>



    <div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="teacherCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form id="teacherForm" name="teacherForm" class="form-horizontal">
                        <input type="hidden" name="teacher_id" id="teacher_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="teacher_name" name="name"
                                    placeholder="Enter Name" value="" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Surname</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="teacher_surname" name="surname"
                                    placeholder="Enter Surname" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="teacher_email" name="email"
                                    placeholder="Enter Email" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Phone Number</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="teacher_phone_number" name="phone_number"
                                    placeholder="Enter Phone Number" value="" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 control-label">Assign Classroom</label>
                            <div class="col-sm-12">
                                <label>Select Classroom :</label>
                                <select class="selectpicker" multiple data-live-search="true" name="selected_classroom[]">
                                    @foreach ($getAllClassrooms as $all_classrooms)
                                        <option value="{{ $all_classrooms->id }}">{{ $all_classrooms->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
