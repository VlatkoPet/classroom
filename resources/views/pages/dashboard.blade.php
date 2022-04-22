@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row mr-3">
            <div class="col-12  mt-3 ml-3 mr-3 mb-3">
                @foreach ($classrooms as $classroom)

                    <h3>{{ $classroom->name }}</h3>
                    <table class="table table-bordered" id="laravel_crud">
                        <thead style="background-color:rgb(158, 196, 233)">
                            <tr>
                                <th>Id</th>
                                <th>Name and Surname</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Role</th>
                                {{-- <td colspan="2">Action</td> --}}
                            </tr>
                        </thead>
                        <tbody id="classrooms-crud">
                            @if (count($classroom->teachers) > 0)

                                @foreach ($classroom->teachers as $user)
                                    <tr id="user_id_{{ $user->id }}">
                                        <td class="teacher_table_class">{{ $user->id }}</td>
                                        <td class="teacher_table_class">{{ $user->name }} {{ $user->surname }}</td>
                                        <td class="teacher_table_class">{{ $user->email }}</td>
                                        <td class="teacher_table_class">{{ $user->phone_number }}</td>
                                        <td class="teacher_table_class">Teacher</td>
                                        {{-- <td class="teacher_table_class"><a href="#" id="edit-user" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-surname="{{ $user->surname }}"
                                            data-email="{{ $user->email }}"
                                            data-phone_number="{{ $user->phone_number }}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td class="teacher_table_class">
                                        <a href="#" id="delete-user" data-id="{{ $user->id }}"
                                            class="btn btn-danger delete-user">Delete</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="teacher_table_class">Нема доделено професор</td>
                                    <td class="teacher_table_class"></td>
                                    <td class="teacher_table_class"></td>
                                    <td class="teacher_table_class"></td>
                                    <td class="teacher_table_class"></td>
                                </tr>
                            @endif

                            @if (count($classroom->students) > 0)
                                @foreach ($classroom->students as $user)
                                    <tr id="user_id_{{ $user->id }}">
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }} {{ $user->surname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>Student</td>
                                        {{-- <td><a href="#" id="edit-user" data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}" data-surname="{{ $user->surname }}"
                                            data-email="{{ $user->email }}"
                                            data-phone_number="{{ $user->phone_number }}" class="btn btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" id="delete-user" data-id="{{ $user->id }}"
                                            class="btn btn-danger delete-user">Delete</a>
                                    </td> --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>Нема доделено студенти</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endforeach
                {{ $classrooms->links() }}
            </div>
        </div>
    </div>


@endsection
