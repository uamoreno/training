<?php

namespace App\Http\Controllers;

use App\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class NotebookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('notebooks.index', [
          'notebooks'=>Notebook::all()->where('user_id','=',Auth::user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData=$request->validate([
            'name'=>'required|min:4',
            'max_notes'=>'required|numeric|gt:0'
        ]);

        $notebook=new Notebook();
        $notebook->name=$request->get('name');
        $notebook->max_notes=$request->get('max_notes');
        $notebook->user_id=Auth::user()->id;
        $notebook->save();
        return redirect("/notebooks/{$notebook->id}/notes");
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
        if(Auth::user()->id!=Notebook::find($id)->user_id){
            return redirect('/notebooks');
        }

        return view('notebooks.edit',[
            'notebook'=>Notebook::find($id)
        ]);
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
        $validData=$request->validate([
            'name'=>'required|min:4',
            'max_notes'=>'required|numeric|gt:0'
        ]);

        $notebook=Notebook::find($id);
        $notebook->name=$request->get('name');
        $notebook->max_notes=$request->get('max_notes');
        $notebook->user_id=1;
        $notebook->save();
        return redirect("/notebooks");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



    }

    public function remove(Request $request){

        $notebook=Notebook::find($request->input('id'));
        if($notebook->delete()){
            $notebooks=Notebook::all()->where('user_id','=',Auth::user()->id);
            return View::make('notebooks.table')->with('notebooks', $notebooks);
        }
    }


}
