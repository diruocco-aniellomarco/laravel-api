<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('tecnologies','type')->paginate(12);
        foreach( $projects as $project ) {
            $project->cover_image = $project->getUrlImag(); 
        }

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id', $id)->with('tecnologies','type')->first();
        $project->cover_image = $project->getUrlImag();
        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
//     public function destroy($id)
//     {
//         //
//     }



    public function projectsByType($type_id) {

        // $type = Type::where("id", $type_id)->select('id','label')->first();

        // if(!$type)
        //     abort(404,"Tipo non trovato");

        $projects = Project::with('tecnologies','type')->where("type_id", $type_id)->paginate(12);

        foreach( $projects as $project ) {
            $project->cover_image = $project->getUrlImag(); 
        }

        return response()->json($projects);
    }
}
