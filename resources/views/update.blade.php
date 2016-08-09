<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
@if(count($tasks)>0)
    
    <form action="update_task" method="post">
    @foreach($tasks as $key=>$task)
            <li>
    <input type="text" name="taskname[]" value="{{$task->task}}">
    <input type="hidden" name="slno[]" value="{{$task->Serial_No}}">
            </li>
    @endforeach
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="update" value="Update" >
    </form>
@endif
</body>
</html>        
