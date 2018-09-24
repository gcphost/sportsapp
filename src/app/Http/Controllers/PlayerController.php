<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Http\Requests\StorePlayer;

class PlayerController extends Controller
{
    function index(Player $player) {
        return $player;
    }

    function store(StorePlayer $request)
    {
        return Player::create($request->validated());
    }

    function update(StorePlayer $request, Player $player)
    {
        if ($player->update($request->validated())) {
            return $player;
        }

        return response()->json(['error' => 'Unable to update player.'], 500);
    }
}
