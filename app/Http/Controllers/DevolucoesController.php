<?php



namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Devolucao;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use PDF;

class DevolucoesController extends Controller
{
    public function index()
    {
        $devolucoes = Devolucao::with('emprestimo')->paginate(25);

        return view('devolucao.create', compact('devolucoes'));
    }

    public function create(Emprestimo $emprestimo)
    {
        return view('devolucao.create', compact('emprestimo'));
    }


    public function store(Request $request, Emprestimo $emprestimo)
    {
        // Calcula a multa (se houver) baseado nos dias de atraso
        $multa = $this->calcularMulta($emprestimo);

        // Cria a devolução no banco de dados
        $devolucao = Devolucao::create([
            'emprestimo_id' => $emprestimo->id,
            'multa' => $multa,
        ]);

        // Gera o PDF com as informações da devolução
        $pdf = PDF::loadView('devolucao.pdf', compact('devolucao', 'emprestimo'));

        // Salva o PDF em algum diretório ou faça o download aqui
        $pdf->save('caminho/para/salvar/o/pdf.pdf');

        // Redireciona para alguma página de confirmação, se necessário
        return redirect()->route('alguma.rota.de.confirmacao');
    }

    private function calcularMulta(Emprestimo $emprestimo)
    {
        // Calcula a quantidade de dias de atraso (substitua pela sua lógica real)
        $diasAtraso = max(0, now()->diffInDays($emprestimo->data_devolucao, false));

        // Calcula o valor da multa (0,50 centavos por dia de atraso)
        $multa = $diasAtraso * 0.50;

        return $multa;
    }
}

