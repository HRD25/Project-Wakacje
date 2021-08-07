<?php

namespace App\Http\Controllers\Offerts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as HttpController;
use App\Http\Requests\AddPostRequest;
use App\Models\additive;
use App\Models\offerta;

class Controller extends HttpController
{
    private $OffertaModel;
    private $AdditiveModel;

    public function __construct(offerta $Offerta, additive $AdditiveModel)
    {
        $this->OffertaModel = $Offerta;
        $this->AdditiveModel = $AdditiveModel;
    }

    public function home()
    {
        return View('user.shared.home');
    }

    public function Offerts()
    {
        return view('user.Offerts.Offerts', [
            'offerts' => $this->OffertaModel->with('additive')->all(),
            'additives' => $this->AdditiveModel->all()
        ]);
    }

    public function Offert(int $id)
    {
        return view('user.Offerts.Offert', [
            'offerta' => $this->OffertaModel->with('additive')->One($id),
            'idUser' => Auth::id()
        ]);
    }

    public function add(Request $request, AddPostRequest $addValid)
    {
        return $this->OffertaModel->Add($request, $addValid);
    }

    public function showAdd()
    {
        return view('user.shared.add', ['dodatki' => $this->AdditiveModel->get()]);
    }

    public function search(Request $request)
    {

    }

    public function delete(int $id)
    {
        return $this->OffertaModel->OneDelete($id);
    }
}
