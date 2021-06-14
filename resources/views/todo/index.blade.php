@extends('bootstrap')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO | Index</title>
</head>

<body>
    <div class="card" style="width:60rem;margin-left: 441px;">
        <div class="card-header">
            <center>
                <h2>ToDo List<a href="/create" style="font-size:15px;margin-left: 350px;">Create ToDo</a></h2>
            </center>
            @include('flash-message')
        </div>
        <div class="alert alert-info fade out" id="asdasd">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success..</strong>&nbsp;&nbsp;&nbsp;SuceesFully ToDo Create
        </div>
        <ul class="list-group list-group-flush">
            @foreach($tododata as $todo)
            <li class="list-group-item">
                @if($todo->complated)
                <span>{{$todo['title']}}</span>
                @else
                {{$todo['title']}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @endif
                <p>
                    <input type="hidden" id="edit_id" name="edit_id" value="{{$todo['id']}}">
                    <!-- <button onclick="edit_to_do()">edit</button> -->
                    <a href="javascript:void(0)" onclick="edit_to_do({{$todo['id']}})" class="btn btn-info"
                        style="margin-left: 420px;" id="edit_button">Edit</a>&nbsp;&nbsp;&nbsp;
                    <!-- <a href="edit/{{$todo['id']}}" style="margin-left: 350px;"
                        class="btn btn-info">Edit</a>&nbsp;&nbsp;&nbsp; -->
                    <!-- <a href="completed/{{$todo['id']}}">Completed</a>&nbsp;&nbsp;&nbsp; -->
                    <!-- <a href="delete/{{$todo['id']}}">Deleted</a> -->
                    <a href="#" class="btn btn-danger" id="saddfsa" onclick="delete_to_do({{$todo['id']}})">Deleted</a>
                </p>
            </li>
            @endforeach
        </ul>
    </div>
    <!-- <div id="login_for_review" class="modal hide" role="dialog">

    </div> -->

    <div class="modal fade" id="login_for_review" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background: orange">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
                            class="ion-android-close"></span></button> -->
                </div> <!-- Modal Body -->
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" id="editid" name="editid">
                        <input type="text" name="title" id="title_model" class="form-control" width="200px"
                            style="width: 244px;text-align: center;margin: auto;"><br>

                        <input type="submit" id="saddfsa" class=" btn btn-success" onclick="update_to_do()"
                            value="edit">
                    </div>
                </form>
            </div>
        </div>

</body>

</html>
<script>
var to_do_id;

function edit_to_do(to_do_id) {
    var edit_id = to_do_id
    console.log(edit_id);
    // $('imagePreview').modal('show');
    $.ajax({
        url: "/edit/" + edit_id,
        post: 'GET',
        data: {
            id: edit_id
        },
        success: function(output) {
            console.log(output.id);
            $('#login_for_review').append(output).modal('show');
            $('#title_model').val(output.title);
            $('#editid').val(output.id);
            // $('#to_do_title').html(output).modal('show')
        }

    });
}

function delete_to_do(to_do_id) {
    var edit_id = to_do_id
    console.log(edit_id);
    var result = confirm("Want to delete?");
    if (result) {
        $.ajax({
            url: "/delete/" + edit_id,
            post: 'GET',
            data: {
                id: edit_id
            },
            success: function(data) {
                window.location.reload('/index')
            }

        });
    }

}

function update_to_do() {
    var title = $("#title_model").val();
    console.log(edit_id);
    $.ajax({
        url: '/update',
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': $("#editid").val(),
            'title': $("#title_model").val(),
        },
        success: function(data) {
            // $('#login_for_review').append(output).modal('show');
            // $('#login_for_review').modal({
            //     backdrop: 'static',
            //     keyboard: true
            // })
            console.log(data);
        }
    });

    function toggleAlert() {
        $(".alert").toggleClass('in out');
        return false; // Keep close.bs.alert event from removing from DOM
    }
    $("#saddfsa").on("click", toggleAlert);
    $('#asdasd').on('close.bs.alert', toggleAlert)
}
</script>