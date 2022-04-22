/* start classroom */

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /*  new classroom */
    $("#create-new-classroom").click(function () {
        $("#btn-save").val("create-classroom");
        $("#classroomForm").trigger("reset");
        $("#classroomCrudModal").html("Add New Classroom");
        $("#ajax-crud-modal").modal("show");
        $("#btn-save").click(function () {
            $.ajax({
                data: $("#classroomForm").serialize(),
                url: "classroom",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                    // $("#btn-save").html("Save Changes");
                },
            });
        });
    });

    /* edit classroom */
    $("body").on("click", "#edit-classroom", function () {
        var classroom_id = $(this).data("id");
        var classroom_name = $(this).data("name");
        $.get("classroom/" + classroom_id + "/edit", function (data) {
            $("#classroomCrudModal").html("Edit classroom");
            $("#btn-save").val("edit-classroom");
            $("#ajax-crud-modal").modal("show");
            $("#classroom_id").val(data.id);
            $("#name").val(classroom_name);
        });
        $("body").on("click", "#btn-save", function () {
            $.ajax({
                data: $("#classroomForm").serialize(),
                url: "classroom",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                    // $("#btn-save").html("Save Changes");
                },
            });
        });
    });

    //delete classroom
    $("body").on("click", "#delete-classroom", function () {
        var classroom_id = $(this).data("id");
        console.log(classroom_id);
        var result = confirm("Are You sure want to delete !");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: "classroom/" + classroom_id,
                success: function (data) {
                    $("#classroom_id_" + classroom_id).remove();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    });
});

if ($("#classroomForm").length > 0) {
    var test = $("#classroomForm").length;
    console.log("ova e test" + test);
    $("#classroomForm").validate({
        submitHandler: function (form) {
            var actionType = $("#btn-save").val();
            console.log(actionType);
            $("#btn-save").html("Sending..");
            console.log(actionType);
            $.ajax({
                data: $("#classroomForm").serialize(),
                url: "classroom",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    location.reload();
                },
                error: function (data) {
                    console.log("Error:", data);
                    // $("#btn-save").html("Save Changes");
                },
            });
        },
    });
}
//end classroom

//start teachers

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /*  new teacher */
    $("#create-new-teacher").click(function () {
        $("#btn-save").val("create-teacher");
        $("#teacherForm").trigger("reset");
        $("#teacherCrudModal").html("Add New Teacher");
        $("#ajax-crud-modal").modal("show");
        $("#btn-save").click(function () {
            $.ajax({
                data: $("#teacherForm").serialize(),
                url: "teacher",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                    // $("#btn-save").html("Save Changes");
                },
            });
        });
    });

    /* edit teacher */
    $("body").on("click", "#edit-teacher", function () {
        var teacher_id = $(this).data("id");
        var teacher_name = $(this).data("name");
        var teacher_surname = $(this).data("surname");
        var teacher_email = $(this).data("email");
        var teacher_phone_number = $(this).data("phone_number");
        $.get("teacher/" + teacher_id + "/edit", function (data) {
            $("#teacherCrudModal").html("Edit Teacher");
            $("#btn-save").val("edit-teacher");
            $("#ajax-crud-modal").modal("show");
            $("#teacher_id").val(data.id);
            $("#teacher_name").val(teacher_name);
            $("#teacher_surname").val(teacher_surname);
            $("#teacher_email").val(teacher_email);
            $("#teacher_phone_number").val(teacher_phone_number);
        });
        $("#btn-save").click(function () {
            $.ajax({
                data: $("#teacherForm").serialize(),
                url: "teacher",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        });
    });

    //delete teacher
    $("body").on("click", "#delete-teacher", function () {
        var teacher_id = $(this).data("id");
        console.log(teacher_id);
        var result = confirm("Are You sure want to delete !");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: "teacher/" + teacher_id,
                success: function (data) {
                    $("#teacher_id_" + teacher_id).remove();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    });
});

if ($("#teacherForm").length > 0) {
    var test = $("#teacherForm").length;
    console.log("ova e test" + test);
    $("#teacherForm").validate({
        submitHandler: function (form) {
            var actionType = $("#btn-save").val();
            console.log(actionType);
            $("#btn-save").html("Sending..");
            console.log(actionType);
            $.ajax({
                data: $("#teacherForm").serialize(),
                url: "teacher",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        },
    });
}
//end teachers

//start students

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    /*  new student */
    $("#create-new-student").click(function () {
        $("#btn-save").val("create-student");
        $("#studentForm").trigger("reset");
        $("#studentCrudModal").html("Add New Student");
        $("#ajax-crud-modal").modal("show");
        $("#btn-save").click(function () {
            $.ajax({
                data: $("#studentForm").serialize(),
                url: "student",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                    // $("#btn-save").html("Save Changes");
                },
            });
        });
    });

    /* edit student */
    $("body").on("click", "#edit-student", function () {
        var student_id = $(this).data("id");
        var student_name = $(this).data("name");
        var student_surname = $(this).data("surname");
        var student_email = $(this).data("email");
        var student_phone_number = $(this).data("phone_number");
        $.get("student/" + student_id + "/edit", function (data) {
            $("#studentCrudModal").html("Edit Student");
            $("#btn-save").val("edit-student");
            $("#ajax-crud-modal").modal("show");
            $("#student_id").val(data.id);
            $("#student_name").val(student_name);
            $("#student_surname").val(student_surname);
            $("#student_email").val(student_email);
            $("#student_phone_number").val(student_phone_number);
        });
        $("#btn-save").click(function () {
            $.ajax({
                data: $("#studentForm").serialize(),
                url: "student",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        });
    });

    //delete student
    $("body").on("click", "#delete-student", function () {
        var student_id = $(this).data("id");
        console.log(student_id);
        var result = confirm("Are You sure want to delete !");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: "student/" + student_id,
                success: function (data) {
                    $("#student_id_" + student_id).remove();
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    });
});

if ($("#studentForm").length > 0) {
    var test = $("#studentForm").length;
    console.log("ova e test" + test);
    $("#studentForm").validate({
        submitHandler: function (form) {
            var actionType = $("#btn-save").val();
            console.log(actionType);
            $("#btn-save").html("Sending..");
            console.log(actionType);
            $.ajax({
                data: $("#studentForm").serialize(),
                url: "student",
                type: "POST",
                dataType: "json",
                success: function (data) {
                    window.location.reload(true);
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        },
    });
}

//end students
$(function () {
    $("select").selectpicker();
});
