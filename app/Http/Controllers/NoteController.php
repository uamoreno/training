<?php

namespace App\Http\Controllers;

use App\Note;
use App\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class NoteController extends Controller
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
    public function index(Notebook $notebook)
    {
        if(Auth::user()->id!=$notebook->user_id){
            return redirect('/notebooks');
        }

        return view('notes.index', [
            'notebook'=>$notebook,
            'notes'=>$notebook->notes
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Notebook $notebook)
    {
        return view('notes.create',[
            'notebook'=>$notebook
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Notebook $notebook)
    {

        $validData=$request->validate([
            'title'=>'required',
            'description'=>'required|max:255'
        ]);

        $note=new Note();
        $note->notebook_id=$notebook->id;
        $note->title=$request->get('title');
        $note->description=$request->get('description');
        $note->has_duedate=(!is_null($request->get('has_duedate'))==1?1:0);
        $note->duedate=(!is_null($request->get('has_duedate'))==1?$request->get('duedate'):null);
        $note->status_id=1;
        $note->save();
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
    public function edit(Notebook $notebook,$id)
    {
        if(Auth::user()->id!=$notebook->user_id){
            return redirect('/notebooks');
        }

        $note=Note::find($id);
        return view('notes.edit',[
            'note'=>$note
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Notebook $notebook,Request $request, $id)
    {

        $validData=$request->validate([
            'title'=>'required',
            'description'=>'required|max:255'
        ]);

        $note=Note::find($id);
        $note->title=$request->get('title');
        $note->description=$request->get('description');
        $note->has_duedate=(!is_null($request->get('has_duedate'))==1?1:0);
        $note->duedate=(!is_null($request->get('has_duedate'))==1?$request->get('duedate'):null);
        $note->status_id=1;
        $note->save();
        return redirect("/notebooks/{$note->notebook->id}/notes");
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

        $note=Note::find($request->input('id'));
        if($note->delete()){
            $notes=Note::all()->where('notebook_id','=',$note->notebook->id);
            return View::make('notes.cards')->with('notes', $notes);
        }
    }
}
