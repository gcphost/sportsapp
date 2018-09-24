<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    function index()
    {
        return Team::all();
    }

    function store(\App\Http\Requests\StoreTeam $request)
    {
        return Team::create($request->validated());
    }

    function get(Team $team)
    {
        return $team;
    }
}
