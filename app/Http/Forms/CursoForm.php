<?php
namespace App\Http\Forms;
use App\{tabla_curso};
use Illuminate\Contracts\Support\Responsable;
class CursoForm implements Responsable
{
    private $view;
    private $curso;
    public function __construct($view, tabla_curso $curso)
    {
        $this->view = $view;
        $this->curso = $curso;
    }
    public function toResponse($request)
    {
        return view($this->view, [
            'curso' => $this->curso,
        ]);
    }
}