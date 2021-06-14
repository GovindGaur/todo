@extends('bootstrap')
<style>
body {
    background-image: url("http://localhost/ToDoList/public/images/todo.jpg");
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO | Edit</title>
</head>

<body style="text-align:center">
    <h2 style="margin: top;margin-top: 203px;">Edit Your ToDo </h2>

    @include('flash-message')

    <!-- <form action="/update" method="POST"> -->
    @csrf

    <div class="form-group">
        <input type="text" name="title" id="title" value="{{$todo['title']}}" class="form-control" width="200px"
            style="width: 244px;text-align: center;margin: auto;"><br>
        <input type="hidden" name="id" value="{{$todo['id']}}">
        <input type="submit" class="btn btn-success" onclick="update_to_do()" value="edit">
    </div>
    <!-- </form> -->
    <!-- <button onclick="update_to_do()">sdfasdf</button> -->
    <a href="/index">Back</a>
</body>

</html>
<script>
function update_to_do() {
    var title = $("#title").val();
    var id = $("#id").val();
    $.ajax({
        url: '/update',
        method: "POST",
        data: {
            title: title,
            id: id,
            "_token": "{{ csrf_token() }}",
        },

        success: function(data) {
            console.log(data);
        }
    });
    // type: "PUT",
}
</script>