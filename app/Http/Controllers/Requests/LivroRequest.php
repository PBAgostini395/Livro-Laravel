<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    public function authorize(): bool { return auth()->check(); }

    public function rules(): array {
        $id = $this->route('livro')?->id;
        return [
            'titulo' => ['required','string','max:255'],
            'isbn' => ['required','string','max:50',"unique:livros,isbn,$id"],
            'ano' => ['nullable','integer','between:1500,'.now()->year],
            'autor_id' => ['required','exists:autores,id'],
            'categoria_id' => ['required','exists:categorias,id'],
        ];
    }
}
