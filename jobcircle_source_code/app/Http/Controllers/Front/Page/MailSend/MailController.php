<?php

namespace App\Http\Controllers\Front\Page\MailSend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use Validator;
use Session;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function basic_email(Request $request){
        
        $name = $request->input('name');
        //echo "<pre>"; print_r($name); echo "</pre>"; exit;
        $validator = Validator::make($request->all(), [
           'email'         => 'required|email|',
           'name'          => 'required|string|max:50',
           'phone'         => 'required|numeric|min:10',
           'user_message'  => 'required'
        ]);
        //echo "<pre>"; print_r($validator); echo "</pre>"; exit;
        if ($validator->fails()) {
            Session::flash('message', 'Please fill all the field'); 
            return redirect()->back()->withInput();
        }
        else
        {
            $data = array(
                            'name'        =>$request->input('name'),
                            'email'       =>$request->input('email'),
                            'phone'       =>$request->input('phone'),
                            'user_message'=>$request->input('user_message'),
                        );
       
            Mail::send('mail', $data, function($message) use($request)
             {
                  $message->to('manojinvisible111@gmail.com');
                  $message->subject('Contact');
                  $message->from($request->input('email'),$request->input('name'));
             }
            );

            return view('front.page.mail.mail');
        }
   }
}
