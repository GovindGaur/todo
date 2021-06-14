<!-- @extends('bootstrap') -->
<style>
body {
    background-image: url("http://localhost/ToDoList/public/images/todo.jpg");
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do | Create</title>
</head>

<body style="text-align:center">
    <h2 style="margin: top;margin-top: 203px;">Create Your ToDo </h2>
    @include('flash-message')
    <!-- <form action="/create" method="POST"> -->
    @csrf
    <div class="alert alert-info fade out" id="asdasd">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success..</strong>&nbsp;&nbsp;&nbsp;SuceesFully ToDo Create
    </div>
    <div class="form-group">
        <input type="text" name="title" id="title" class="form-control" width="200px"
            style="width: 244px;text-align: center;margin: auto;"><br>
        <input type="submit" onclick="create_to()" value="create" id="saddfsa" class="btn btn-success">

    </div>
    <!-- </form> -->
    <a href="/index">Back</a>
    <!-- <button id="saddfsa">Toggle</button> -->


</body>

</html>
<script>
function create_to() {
    var title = $("#title").val();
    $.ajax({
        url: "/upload_data",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            title: title
        },
        success: function(response) {
            console.log(response);
        }
    });
}

function toggleAlert() {
    $(".alert").toggleClass('in out');
    return false; // Keep close.bs.alert event from removing from DOM
}
$("#saddfsa").on("click", toggleAlert);
$('#asdasd').on('close.bs.alert', toggleAlert)
</script>