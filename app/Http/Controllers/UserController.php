<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class UserController extends Controller
{
    //listar
    /**
     * @return void
     */
    public function listar()
    {
        $users = User::all();
    $userObject = json_decode($users);
    return view('Users.list', compact('users'));
    }

    //criar
    /**
     * @return void
     */
    public function criar()
    {
    $data = request()->all();
    User::create($data);
    return redirect('/usuarios');
    }


    //deletar
    /**
     * @param integer $id
     *
     * @return void
     */
    public function deletar(int $id)
    {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('usuarios');
    }


    //formulario edicao
    /**
     * @param integer $id
     *
     * @return void
     */
    public function editForm(int $id)
    {
        $user = User::findOrFail($id);

    return view('Users.edit', compact('user'));
    }

    //edicao
    /**
     * @param integer $id
     *
     * @return void
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        $data = request()->all();
        $user->update($data);
        return redirect('usuarios');

    }
}
