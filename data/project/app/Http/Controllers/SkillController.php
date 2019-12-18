<?php

namespace App\Http\Controllers;

use App\Skill;
use Validator;
use Illuminate\Http\Request;


class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills=Skill::All();

        return response()->json([
            'state'=>'sucess',
            'description'=>$skills,
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'state'=>'error',
                'message'=>$validator->errors(),
            ]);
        }else{
            $skill=new Skill([
            'name'=>$request->name,
            ]);

            $skill->save();

            return response()->json([
                'state'=>'sucess',
                'message'=>'Nouvelle compétence !',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Skill::find($id);

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
        $show=Skill::find($id);
        //$show=Intern::find($intern->id);

        $show->name = $request->name;

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
        $delete=Skill::find($id);
        $delete->delete();

        return response()->json([
            'state'=>'sucess',
            'description'=>'Compétence perdue !!',
        ]);
    }
}
