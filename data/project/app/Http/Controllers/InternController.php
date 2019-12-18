<?php

namespace App\Http\Controllers;

use App\Intern;
use Validator;
use Illuminate\Http\Request;

class InternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interns=Intern::All();

        return response()->json([
            'state'=>'sucess',
            'description'=>$interns,
        ]);
        //je transforme la réponse en json puis je la stocke dans un array ce qui me permettra de cibler plus aisément l'information en cas de recherche
        //le state créé un boolean qui permettra les if

    }

    //
    // Show the form for creating a new resource.
    // INUTILE EN CAS D'API, ON PASSE DIRECTEMENT AU store tant que pas de front
    
    // @return \Illuminate\Http\Response
     
    //public function create()
    //{
        //
    //}
    // Store a newly created resource in storage.
    //
    // @param  \Illuminate\Http\Request  $request
    // @return \Illuminate\Http\Response
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required|integer|max:255',
            'phone_number' => 'required|unique:interns|max:255',
            'email' => 'required|unique:interns|max:255',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'state'=>'error',
                'message'=>$validator->errors(),
            ]);
        }else{
            $intern=new Intern([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'age'=>$request->age,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            ]);

            $intern->save();

            // return response()->json([
            //     'state'=>'sucess',
            //     'message'=>'Apprenant créé !',
            // ]);

            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function show(Intern $intern)
    {
        $show=Intern::find($intern);

        return response()->json([
            'state'=>'sucess',
            'description'=>$show,
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Intern  $intern
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Intern $intern)
    // {
    //     //
    // }
    //INUTILE EN CAS D'API car pas de front

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Intern $intern)
    {
        $show=Intern::find($intern);
        //$show=Intern::find($intern->id);

        $show->firstname = $request->firstname;
        $show->lastname = $request->lastname;
        $show->age = $request->age;
        $show->phone_number = $request->phone_number;
        $show->email = $request->email;

        $show->save();

        return response()->json([
            'state'=>'sucess',
            'description'=>'modification effectuée',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intern $intern)
    {
        $delete=Intern::find($intern->id);
        $delete->delete();

        return response()->json([
            'state'=>'sucess',
            'description'=>'apprenant supprimé',
        ]);
    }
}
