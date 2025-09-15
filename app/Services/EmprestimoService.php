<?php

class EmprestimoService {
    public function emprestar(Exemplar $exemplar, User $user): Emprestimo {
        if ($exemplar->status !== 'disponivel') {
            throw new \Exception('Exemplar indisponível.');
        }
        $dias = (int) (env('LOAN_DAYS', 7));
        $hoje = now()->toDateString();
        $prevista = now()->addDays($dias)->toDateString();

        $emp = Emprestimo::create([
            'exemplar_id'=>$exemplar->id,
            'user_id'=>$user->id,
            'data_emprestimo'=>$hoje,
            'data_prevista'=>$prevista,
        ]);

        $exemplar->update(['status'=>'emprestado']);
        return $emp;
    }

    public function devolver(Emprestimo $emp): Emprestimo {
        if ($emp->data_devolucao) return $emp;
        $emp->data_devolucao = now()->toDateString();

        $atraso = Carbon\Carbon::parse($emp->data_prevista)->diffInDays(now(), false);
        $emp->multa = $atraso > 0 ? $atraso * 1.00 : 0; // regra simples
        $emp->save();

        $emp->exemplar->update(['status'=>'disponivel']);
        return $emp;
    }
}
