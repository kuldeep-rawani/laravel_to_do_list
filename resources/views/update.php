 <?php

 if (count($tasks) > 0){
        // <div class="panel panel-default">
        //     <div class="panel-heading">
        //         Current Tasks
        //     </div>

        //     <div class="panel-body">
        //         <table class="table table-striped task-table">

        //             <!-- Table Headings -->
        //             <thead>
        //                 <th>Task</th>
        //                 <th>&nbsp;</th>
        //             </thead>

        //             <!-- Table Body -->
        //             <tbody>

                        foreach ($tasks as $task){
                            // <tr>
                            //     <!-- Task Name -->
                            //     <td class="table-text">
                                     echo '<html><li>
                       
                     <span>'.$task->task.'</span>
                     
                      <button name="del" value="del" style="height: 20px; width: 50px">
                       <a href="remove_task?PID='.$task->Serial_No.'" style="text-decoration:none">delete</a>
                      </button>

                       

                   
        
      </li></html>';


        //                         </td>

        //                         <td>
        //                             <!-- TODO: Delete Button -->
        //                         </td>
        //                     </tr>
        //                 }
        //             </tbody>
        //         </table>
        //     </div>
        // </div>
    }
}
    ?>