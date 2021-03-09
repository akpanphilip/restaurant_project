<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>User dashboard</h2>
    <p>Ready to build</p>
    <form action="{{'/admin/dashboard'}}" method="post">
        @csrf
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>
</body>

</html>