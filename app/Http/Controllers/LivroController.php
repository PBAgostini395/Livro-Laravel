<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::latest()->paginate(10);
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $mensagens = [
            'titulo.required' => 'O título é obrigatório.',
            'isbn.unique'     => 'Já existe um livro com este ISBN.',
        ];

        $dados = $request->validate([
            'titulo' => ['required','string','max:255'],
            'autor'  => ['nullable','string','max:255'],
            'isbn'   => ['nullable','string','max:50','unique:livros,isbn'],
            'ano'    => ['nullable','integer','between:1500,'.now()->year],
            'ativo'  => ['sometimes','boolean'],
        ], $mensagens);

        // checkbox não enviado = false
        $dados['ativo'] = $request->boolean('ativo');

        Livro::create($dados);

        return redirect()->route('livros.index')->with('ok','Livro cadastrado!');
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $mensagens = [
            'titulo.required' => 'O título é obrigatório.',
            'isbn.unique'     => 'Já existe um livro com este ISBN.',
        ];

        $dados = $request->validate([
            'titulo' => ['required','string','max:255'],
            'autor'  => ['nullable','string','max:255'],
            'isbn'   => [
                'nullable','string','max:50',
                Rule::unique('livros','isbn')->ignore($livro->id)
            ],
            'ano'    => ['nullable','integer','between:1500,'.now()->year],
            'ativo'  => ['sometimes','boolean'],
        ], $mensagens);

        $dados['ativo'] = $request->boolean('ativo');

        $livro->update($dados);

        return redirect()->route('livros.index')->with('ok','Livro atualizado!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()->route('livros.index')->with('ok','Livro excluído!');
    }
}
