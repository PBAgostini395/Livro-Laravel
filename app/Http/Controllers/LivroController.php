<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::orderByDesc('id')->paginate(10);

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:255', 'unique:livros,titulo'],
            'autor'  => ['nullable', 'string', 'max:255'],
            'isbn'   => ['required', 'string', 'max:255', 'unique:livros,isbn'],
            'ano'    => ['nullable', 'integer'],
            'ativo'  => ['nullable', 'boolean'],
        ]);

        $validated['ativo'] = $request->boolean('ativo');

        Livro::create($validated);

        return redirect()
            ->route('livros.index')
            ->with('success', '📚 Livro criado com sucesso!');
    }

    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $validated = $request->validate([
            'titulo' => [
                'required', 'string', 'max:255',
                Rule::unique('livros', 'titulo')->ignore($livro->id),
            ],
            'autor'  => ['nullable', 'string', 'max:255'],
            'isbn'   => [
                'required', 'string', 'max:255',
                Rule::unique('livros', 'isbn')->ignore($livro->id),
            ],
            'ano'    => ['nullable', 'integer'],
            'ativo'  => ['nullable', 'boolean'],
        ]);

        $validated['ativo'] = $request->boolean('ativo');

        $livro->update($validated);

        return redirect()
            ->route('livros.index')
            ->with('success', '✏️ Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()
            ->route('livros.index')
            ->with('success', '🗑️ Livro excluído com sucesso!');
    }
}
