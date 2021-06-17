<?php

namespace App\Http\Controllers;

use App\Question;
use App\Reponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reponses = Reponse::paginate(10);
        return view ('reponses.index')->with('reponses' ,$reponses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::get();
        return view('reponses.create',compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'rep' => 'required',
            'exact' => 'required',
            'question_id' => 'required'
        ]);
        $reponse = new Reponse;
        $reponse->rep = $request->input('rep');
        $reponse->exact = $request->input('exact');
        $reponse->question_id = $request->input('question_id');


        $reponse->save();
        $reponses = Reponse::paginate(10);
        $success = 'reponse added';
        return view('reponses.index',compact('reponses','success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reponse = Reponse::find($id);
        return view('reponses.show',compact('reponse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reponse = Reponse::find($id);

        if (!isset($reponse )){
            return view('reponses')->with('error', 'reponse not found');
        }
        if(auth()->user()->email !=='slim.khamessi@gmail.com'){

            return redirect('reponses')->with('error', 'Access denied');
        }
        return view('reponses.edit',compact('reponse'));
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
        $this->validate($request, [
            'rep' => 'required',
            'exact' => 'required',
            'question_id' => 'required'
        ]);
        $reponse = Reponse::find($id);
        $reponse->rep = $request->input('rep');
        $reponse->exact = $request->input('exact');
        $reponse->question_id = $request->input('question_id');


        $reponse->save();

        return view('reponses')->with('success', 'reponse edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $reponse= Reponse::find($id);

        if(auth()->user()->email != 'slim.khamessi@gmail.com'){
            dd('Unauthorized page');
            return view('reponses')->with('error', 'Unauthorized page');

        }


        $reponse->delete();
        $reponses = Reponse::paginate(10);
        $success = 'reponse deleted';
        return view('reponses.index',compact('reponses','success'));
    }
}
