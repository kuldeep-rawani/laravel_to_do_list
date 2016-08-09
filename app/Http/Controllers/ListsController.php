<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Lists;
use App\User;
use App\task_list;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\Auth\PasswordController;                

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('welcome');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$cards=DB::table('list')->get();
        //$cards=list::all();
        //return view('welcome',compact('cards'));
    }

    public function login(Request $request)
    {

        $this->validate($request,[
             'name'=>'required',
             'password'=>'required|min:4'
             //'email'=>'required'
            ]);
        // $data=array(
        //     'Username'=> DB::table('users')->select('Username'),
        //     'Password'=>DB::table('users')->select('Password')
        //     );
        
        $data=['name'=>$request['name'],
        'password'=>$request['password']];
        //dd($data);
        if(Auth::attempt($data)){
            //echo "success";
            return view('after_login');
        }
        else{
            return redirect()->back()->with('error','something went wrong');
        }






    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request->all());
        // //
        // $li=['First_Name'=>$request['First_Name'],'Last_Name'=>$request['Last_Name']];
        // $us=['name'=>$request['Username'],'password'=>$request['Password'],'email'=>['email']];
        // DB::table('list')->insert($li);
        // // return redirect('UsersController@store');
        $this->validate($request,[
             'First_Name'=>'required',
             'Last_Name'=>'required',
            'email'=>'required',
            'Username'=>'required',
              'Password'=>'required',
              'ConfirmPassword'=>'required'

              ]);
        // dd($request['First_Name']);
        // $li=new \App\Lists();
        // $li->First_Name=$request['First_Name'];
        // $u->Last_Name=$request['']
        if($request['ConfirmPassword']==$request['Password']){
        $us=\App\User::create(['name'=>$request['Username'],
                              'password'=>bcrypt($request['Password']),
                              'email'=>$request['email']]);
        $user_id=$us->id;
        $data = ['user_id'=>$user_id,'First_Name'=>$request['First_Name'],
                               'Last_Name'=>$request['Last_Name']];
        // dd($data);                               
        // dd($user_id);
        $li=\App\Lists::create($data);
        return view('after_registration');
        //dd($li);

        }
        else{
            return view('password_page');
        }
        //DB::table('users')->insert($us);
        //return make::('users',compact($us));



        
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $card=Lists::find($id);
        return $card;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(){
        Auth::logout();
        session()->flush();
        return view('index');
    }
    public function add_task(Request $request){
        $user=Auth::user();
        $id=$user->id;
        $task=['id'=>$id,'task'=>$request['title1']];
        $ls=\App\task_list::create($task);
        return redirect('show_task');



    }
    public function show_task(){
       $user=Auth::user();
        $id=$user->id;
        $tasks=\App\task_list::orderBy('created_at','asc')->where('id',$id)->get();
        return view('display_task',compact('tasks'));
        
    }
    public function remove_task(){
        $user=Auth::user();
        $Serial_No=$_GET['PID'];
        //echo $Serial_No;
        //$Serial_No=$user->Serial_No;
        $task=\App\task_list::where('Serial_No',$Serial_No)->delete();
        $tasks=\App\task_list::orderBy('created_at','asc')->get();
        return view('display_task',compact('tasks')); 
        
    }
    public function new_show_task(){
        $user=Auth::user();
        $id=$user->id;
        $tasks=\App\task_list::orderBy('created_at','asc')->where('id',$id)->get();
        return view('new_display_task',compact('tasks'));
        

    }
    public function checking_check_box(Request $request){
        $check=$request['check'];
        $tasks=[];
       foreach($check as $checks){
         $task=\App\task_list::orderBy('created_at','asc')->where('Serial_No',$checks)->first();;
         
         
         // $task1['Serial_No' => $task->Serial_No, 'task' => $task->task];
         array_push($tasks, $task);
    }
        return view('update',['tasks'=>$tasks]);
        // return $tasks;
        // return $check->task;

    }
public function update_task(Request $request){
    // $count = 0;
$user=Auth::user();
        $id=$user->id;
    // foreach ($request->all() as $key => $value) {
    //     // dd(array_shift(explode('_', $key)));
    //     $x = str_replace('_'.$count, '', $key);
    //     $count ++;
    //     if($x == 'task')
    //         $data['task'] = $value;
    //     elseif ($x == 'Serial_No') {
    //         $data['Serial_No'] = $value;
    //     }
    //     if($count % 2 == 0){
    //         dd($data, $count);
    //         \App\task_list::where('Serial_No',$data['Serial_No'])->update($data);
    //     }
    // }
    //echo $request['Serial_No'];
    //$task=\App\task_list::where('Serial_No',$Serial_No)->update(['task'=>$request['task']]);
     $slno = $request['slno'];
     foreach ($slno as $key => $n) {
         $task=\App\task_list::where('Serial_No',$n)->update(['task'=>$request['taskname'][$key]]);
     }
    // return $request['taskname'][0];
     $tasks=\App\task_list::orderBy('created_at','asc')->where('id',$id)->get();
      return view('new_display_task',compact('tasks')); 

}
 }
// <input type="text" name="task.{{$key}}" value="{{$task->task}}">
//     <input type="hidden" name="Serial_No.{{$key}}" value="{{$task->Serial_No}}">        
