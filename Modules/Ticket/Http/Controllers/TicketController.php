<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Ticket;
use DB;

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
            $ticket->save();
        // return '123';
        return view('ticket::ticket\view');
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
