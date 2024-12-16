<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use GuzzleHttp\Promise\Create;

class Registrationscontroller extends Controller
{
    //

public function index()
{
    return view('index');
}

    public function save(Request $request)
    {
    //     $name=$request->input('name');
    
    //     $email=$request->input('email');
    //     $created_at=date('Y-m-d h:i:sa');

    //     $register=new Registration();

    //     $register->name=$name;
    //     $register->email=$email;
    //     $register->created_at=$created_at;
        // echo '<pre>';
        // print_r($register);
        // exit();
    //    // dd($register);
    //     $register->save();

    $data=$request->only(['name','email','created_at']);

    // echo '<pre>';
    //     print_r($data);
    //     exit();

            $register=Registration::create($data);

       // return 'The Registration details has been saved &nbsp;&nbsp;'.$register->name;
       // return view('list/'.$register->id);
        return redirect('list')->with('status', 'The Registration details has been saved-'.$register['id']);
    }

    public function list($id=null)
{

    $register=Registration::all();
    // echo '<pre>';
    // print_r($register);
    // exit();
    $reg = Registration::all()->where('is_active','1')->sortBy('name');
    // echo '<pre>';
    // print_r($reg);
    // exit();
    return view('list',['register'=>$reg]);

}
public function edit($id=null)
    {

        // echo '<pre>';
        // print_r($id);
        // exit();
    //     $name=$request->input('name');
    //     $email=$request->input('email');
    //     $created_at=date('Y-m-d h:i:sa');

    //     $register=new Registration();

        // $register->name=$name;
        // $register->email=$email;
        // $register->created_at=$created_at;
        // echo '<pre>';
        // print_r($register);
        // exit();
    //    // dd($register);
    //     $register->save();

    // $register = Registration::findOrFail($id);

    $register = Registration::findOrFail($id);
    //$register = Registration::where('id',$id)->get();
    // echo '<pre>';
    //     print_r($register);
    //     exit();
    // $validatedData = $request->validate([
    //     'name' => 'required|max:255',
    //     'email' => 'required'
    // ]);
    // Registration::whereId($id)->update($validatedData);

    // return redirect('list')->with('success', 'Game Data is successfully updated');

   // $data=$request->only(['name','email','created_at']);

    // echo '<pre>';
    //     print_r($register);
    //     exit();
  //  $register=Registration::all();

    // echo '<pre>';
    // print_r($register);
    // exit();
          //  $register=Registration::create($data);

       // return 'The Registration details has been saved &nbsp;&nbsp;'.$register->name;
        return view('edit',compact('register'));
       // return redirect('list')->with('status', 'The Registration details has been saved-'.$register['id']);
    }


    public function update(Request $request, $id)
{

    // echo '<pre>';
    // print_r($id);
    // exit();

    $register = Registration::findOrFail($id);

    $register->name=$request->input('name');;
    $register->email=$request->input('email');;
    $register->updated_at=date('Y-m-d h:i:sa');
    // echo '<pre>';
    // print_r($register);
    // exit();
   
    $register->save();
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required'
        // ]);

        // echo '<pre>';
        // print_r($validatedData);
        // exit();


        // Registration::whereId($id)->update($validatedData);

        return redirect('list')->with('status', 'The Registration details has been updated');
}

public function delete($id=null)
{

    // echo '<pre>';
    // print_r($id);
    // exit();
 $register = Registration::findOrFail($id);
 $register->is_active=0;
//  echo '<pre>';
//  print_r($register);
//  exit();
 $register->save();
// return 'The user has been detailed <a href="'.url('list').'">List</a>';
return redirect('list')->with('status', 'User Data is successfully deleted');
}

function ajaxdata($id)
{

    // echo '<pre>';
    // print_r($id);
    // exit();
    $register = Registration::findOrFail($id);
    // echo '<pre>';
    // print_r($register);
    // exit();

    return view('ajaxdata',compact('register'));

}


public function ajaxupdate(Request $request, $id)
{

    // echo '<pre>';
    // print_r($id);
    // exit();

    $register = Registration::findOrFail($id);

    $register->name=$request->input('name');
    $register->email=$request->input('email');
    $register->updated_at=date('Y-m-d h:i:sa');

    $register->save();
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required'
        // ]);

        // echo '<pre>';
        // print_r($validatedData);
        // exit();


        // Registration::whereId($id)->update($validatedData);

        return redirect('list')->with('status', 'The Registration details has been updated');
}

}