<?php

namespace App\Http\Controllers\SiteControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use App\Projectcategory;
use App\Realestate;

class ProjectController extends Controller
{
    public function index($projectcategory_id)
    {
        $allprojectsinoneprojectcategory=Project::whereProjectcategory_id($projectcategory_id)
     ->whereActive(1)
     ->get();
        $projectcategory=Projectcategory::whereId($projectcategory_id)->first();
        return view('site.allprojectspage', compact('allprojectsinoneprojectcategory', 'projectcategory'));
    }


    public function GetProjectPage($project_id)
    {
        $lots = Realestate::latest()->where([
['approvement',1],
['catch',1]
])->take(3)->get();

        $project=Project::whereId($project_id)->first();
        $allprojectsinoneprojectcategory=Project::limit(8)->whereProjectcategory_id($project->projectcategory_id)
    ->where('id', '!=', $project_id)
    ->get();
        if (isset($project)) {
            $project->view=$project->view +1;
            $project->save();
            return view('site.oneprojectspage', compact('project', 'allprojectsinoneprojectcategory', 'lots'));
        }
    }
}
