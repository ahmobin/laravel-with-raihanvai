<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="{{ route("users.update",$user->id) }}" method="post">
    @csrf
    @method("put")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <input type="text" name="name" value="{{ $user->name }}"><br>
    <input type="email" name="email"  value="{{ $user->email }}"><br>


    <button type="submit">Update</button>
</form>



<form action="{{ route("users.destroy",$user->id) }}" method="post">
    @csrf
    @method("delete")

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button type="submit">Delete</button>
</form>

</body>
</html>
