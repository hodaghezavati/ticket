<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Ticket;
use DB;
use Illuminate\Support\Str;
use Session;



use Auth;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // print_r($_POST);
        // exit();
        // exit();
        // $this->validate($request,[
        //     'subject'=>'required',
        //     'body'=>'required',
        //     'status'=>'required',
        // ]);
        // return view('/ticket/view');

        $ticket = new ticket;
            $ticket->subject = $_POST["subject"];
            $ticket->body = $_POST["body"];
            $ticket->status = $_POST["status"];
            $ticket->token = $_POST["_token"];
            $ticket->user_id = Auth::id();
            $ticket->if_closed =0;
          
            





            $id = Str::random(20);

            $validator = \Validator::make(['id'=>$id],['id'=>'unique:table,col']);
       
            // if($validator->fails()){
            //      return $this->randomId();
            // }
       
            $ticket->sh_paygiri= $id;
        // return '123';
        $ticket->save();
         Session::flash('success','شماره پیگیری: '. $id); 

        // return view('ticket::ticket\view');
        // return view('ticket::index');
        return back();

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function answersave(Request $request)
    {
        // print_r($_POST);
        // exit();
        // exit();
        // $this->validate($request,[
        //     'subject'=>'required',
        //     'body'=>'required',
        //     'status'=>'required',
        // ]);
        // return view('/ticket/view');

        // $t = DB::select('select * from tickets where id = '.$_POST["ticket_id"]);
        $t =DB::table('tickets')
              ->where('id', $_POST["ticket_id"])
              ->update(['if_closed' => 1]);
        // $t ->if_closed=1;
        // $t->save();
            $ticket = new ticket;
            $ticket->body = $_POST["body"];
            $ticket->ticket_id=$_POST["ticket_id"];
            $ticket->token = $_POST["_token"];
            $ticket->user_id = Auth::id();
           
            $ticket->save();
        // return '123';
        return view('ticket::index');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('ticket::index');
    }
    public function track(Request $request)
    {
        if($_GET){
            print_r($_GET['sh_paygiri']);
            $text=rtrim($_GET['sh_paygiri']);
            $text=ltrim($_GET['sh_paygiri']);
            // $t = DB::select('select * from tickets where sh_paygiri LIKE'.$text);
            $t=ticket::where('sh_paygiri', 'like', '%' .$text . '%')->get();
           
            if($t ){
                $t_id=$t[0]->id;
            }else{
                return view('ticket::index');
            }
            
            
            //url('/ticket/answer?id='.$object->id)
            return redirect('/ticket/answer?id='.$t_id);
            // return view('ticket::answer::'.$t_id);
        }
        
        return view('ticket::track');
    }
    
    public function answer()
    {
        return view('ticket::answer');
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ticket::ticket\create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('ticket::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('ticket::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function view()
    {
        exit();
        return view('ticket::ticket\view');
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
