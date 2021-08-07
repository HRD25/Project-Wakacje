<?php

namespace App\Models;

use App\Http\Requests\AddPostRequest;
use App\Models\additive;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class offerta extends Model
{
    // REALTION
    public function additive()
    {
        return $this->belongsTo(additive::class, 'id_additives', 'id');
    }

    // SCOPE
    public function scopeAll(Builder $query)
    {
        return $query
            ->get();
    }

    public function scopeOne(Builder $query, int $id)
    {
        return $query
            ->where('id', '=', $id)
            ->get();
    }

    public function scopeOneDelete(Builder $query, int $id)
    {
        $query
            ->where('id', '=', $id)
            ->delete();

        return redirect(route('get.offerts'))->with('message', 'Usunieto Oferte!');
    }

    public function scopeAdd(Builder $query, Request $request, AddPostRequest $addValid)
    {
        $addValid->validated();

        $query->insert([
            'panstwo' => $request->panstwo,
            'miasto' => $request->miasto,
            'cena' => $request->cena,
            'zdjecie' => $request->zdjecie->store('wakacje', 'public'),
            'id_additives' => $request->dodatki,
            'osoby' => $request->osoby,
            'id_user' => Auth::id(),
            'od' => $request->od,
            'do' => $request->do,
            'opis' => $request->opis,
            'dostepnosc' => $request->dostepnosc,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect(route('get.offerts'))->with('message', 'Dodano nowa Oferte!');
    }
}
