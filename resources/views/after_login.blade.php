
<!doctype html>
<meta charset="utf-8" />
<title>Todo list</title>

<head>
    <h1>
        <span>Todo list</span>
    </h1>
</head>
<body>
<ul>
    <li>
        <form method="post" action="add_task">
            <input  type="hidden" name="index" />
            <input name="title1" value=" " />
            <input type="submit" value="Add">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>
        
            <button name="actionout" value="Log out">
                <a href="logout" style="text-decoration:none">Logout</a>
            </button>

            
             <button name="actionshow" value="show task">
                <a href="new_display_task" style="text-decoration:none">Show task</a>
            </button>
            <button name="actiondelete">
                <a href="show_task" style="text-decoration:none">Delete</a>
             </button>
             <!--<button name="assign" value="assign">
                <a href="insert.php" style="text-decoration:none">Assign a task</a>
            </button>-->
            <!--  <button name="assigned_task" value="assigned_task">
                <a href="assigned_task.php" style="text-decoration:none">Assigned_Task</a>
             -->






            <!--<button name="action" value="check">
                <span>Check</span>
            </button>-->
        
    </li>

</ul>

    
</body>
</html>
