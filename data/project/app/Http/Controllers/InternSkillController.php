<?php

namespace App\Http\Controllers;

use App\InternSkill;
use App\Intern;
use App\Skill;
use Illuminate\Http\Request;

class InternSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internSkills=InternSkill::All();

        return response()->json([
            'state'=>'sucess',
            'description'=>$internSkills,
        ]);
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
        $internSkill=new InternSkill([
        'intern_id'=>$request->intern_id,
        'skill_id'=>$request->skill_id,
        ]);

        $internSkill->save();

        return response()->json([
            'state'=>'sucess',
            'message'=>'Nouvelle compétence ajoutée!',
        ]);     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=InternSkill::find($id);

        return response()->json([
            'state'=>'sucess',
            'description'=>$show,
        ]);
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
        $show=InternSkill::find($id);
        //$show=Intern::find($intern->id);

        $show->intern_id = $request->intern_id;
        $show->skill_id = $request->skill_id;

        $show->save();

        return response()->json([
            'state'=>'sucess',
            'description'=>'modification de la compétence effectuée',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=InternSkill::find($id);
        $delete->delete();

        return response()->json([
            'state'=>'sucess',
            'description'=>'Relation perdue !!',
        ]);
    }
}
