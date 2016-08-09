<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    @if(count($tasks) > 0)
        <form action="checking_check_box" method="post">
         @foreach($tasks as $task)
            <li>
                <input name="check[]" type="checkbox" value="{{ $task->Serial_No }}">
                <span>{{ $task->task }}</span>
            </li>

         @endforeach
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="submit" name="update" value="Update" >
        </form>
    @endif
</body>
</html>

