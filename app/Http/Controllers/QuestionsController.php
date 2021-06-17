<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Theme;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view ('questions.index')->with('questions' ,$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->email !=='slim.khamessi@gmail.com'){
            return view('questions.index')->with('error', 'Access denied');
        }
        $themes = Theme::get();
        return view('questions.create',compact('themes'));
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
            'question' => 'required',
            'type' => 'required',
            'theme_id' => 'required',
            'score'=>'required'
        ]);
        $question = new Question;
        $question->question = $request->input('question');
        $question->type = $request->input('type');
        $question->theme_id = $request->input('theme_id');
        $question->score = $request->input('score');
        $question->save();

        return redirect('/questions')->with('success', 'Question added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);

        if (!isset($question )){
            return redirect('/questions')->with('error', 'Question not found');
        }
        //dd(auth()->user());
        // Check for Admin
        if(auth()->user()->email !=='slim.khamessi@gmail.com'){

            return redirect('/questions')->with('error', 'Access denied');
        }
        $themes = Theme::get();
        return view('questions.edit',compact('question','themes'));
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
            'question' => 'required',
            'type' => 'required',
            'theme_id' => 'required',
            'score'=>'required'
        ]);
        $question = Question::find($id);

        $question->question = $request->input('question');
        $question->type = $request->input('type');
        $question->theme_id = $request->input('theme_id');
        $question->score = $request->input('score');
        $question->save();

        return redirect('/questions')->with('success', 'Question modifié avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question= Question::find($id);

        if(auth()->user()->email != 'slim.khamessi@gmail.com'){
            return redirect('/questions')->with('error', 'Unauthorized page');

        }


        $question->delete();
        return redirect('/questions')->with('success', 'Question Supprimé');

    }
}
