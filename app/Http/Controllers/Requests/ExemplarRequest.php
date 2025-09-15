<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExemplarRequest extends FormRequest
{
    public function authorize(): bool { return auth()->check(); }

    public function rules(): array {
        $id = $this->route('exemplar')?->id;
        return [
            'livro_id' => ['required','exists:livros,id'],
            'tombo'    => ['required','string','max:100',"unique:exemplares,tombo,$id"],
        ];
    }
}
