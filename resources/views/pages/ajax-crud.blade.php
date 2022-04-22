1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravel 6 First Ajax CRUD Application - Tutsmake.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding: 0.5%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="margin-top: 12px;" class="alert alert-success">laravel 6 First Ajax CRUD Application - <a href="https://www.tutsmake.com" target="_blank">TutsMake</a></h2><br>
        <div class="row">
            <div class="col-12">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-user">Add User</a>
                <a href="https://www.tutsmake.com/jquery-submit-form-ajax-php-laravel-5-7-without-page-load/" class="btn btn-secondary mb-2 float-right">Back to Post</a>
                <table class="table table-bordered" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody id="users-crud">
                        @foreach($users as $u_info)
                        <tr id="user_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>{{ $u_info->name }}</td>
                            <td>{{ $u_info->email }}</td>
                            <td><a href="javascript:void(0)" id="edit-user" data-id="{{ $u_info->id }}" class="btn btn-info">Edit</a></td>
                            <td>
                                <a href="javascript:void(0)" id="delete-user" data-id="{{ $u_info->id }}" class="btn btn-danger delete-user">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</body>

</html>