<?php

namespace App\Http\Controllers;

use App\Question;
use App\Reponse;
use App\Theme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::paginate(10);
        return view ('themes.index')->with('themes' ,$themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
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
            'nom' => 'required',
            'description' => 'required'
        ]);
        $theme = new Theme;
        $theme->nom = $request->input('nom');
        $theme->description = $request->input('description');

        $theme->save();

        return view('themes')->with('success', 'Theme added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::find($id);
        return view('themes.show',compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);

        if (!isset($theme )){
            return view('themes')->with('error', 'theme not found');
        }
        if(auth()->user()->email !=='slim.khamessi@gmail.com'){

            return redirect('themes')->with('error', 'Access denied');
        }
        return view('themes.edit',compact('theme'));
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
            'nom' => 'required',
            'description' => 'required'
        ]);
        $theme = Theme::find($id);
        $theme->nom = $request->input('nom');
        $theme->description = $request->input('description');

        $theme->save();

        return view('themes')->with('success', 'Theme Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme= Theme::find($id);

        if(auth()->user()->email != 'slim.khamessi@gmail.com'){
            return view('themes')->with('error', 'Unauthorized page');

        }


        $theme->delete();
        return view('themes')->with('success', 'Theme Supprimé');
    }


    public function calcul(Request $request)
    {
        if(count($request->input()) < 2)
        {
            dd('the request shouldent be empty');
        }


        $result =0;
        foreach ($request->input() as $input)
        {
            if (is_numeric($input))
            {
                $rep = Reponse::find($input);
                $question = Question::find($rep->question_id);
                $repexact = Reponse::where('question_id','=',$rep->question_id)->where('exact','=','1')->count();
                if($rep->exact)
                {
                    //dd($rep);
                    $result =$result +( $question->score /$repexact);
                }

            }
        }
        $max = 0;
        foreach( ($question->theme->questions) as $question )
        {
            $max = $max + $question->score;
        }
        //dd($question->theme->questions);

        $note = $result;
        return view('themes.results',compact('note','max'));
    }

}
