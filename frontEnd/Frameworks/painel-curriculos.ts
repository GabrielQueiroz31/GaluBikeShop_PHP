import { Component, OnInit } from '@angular/core';
import { Curriculo } from '../../model/curriculo.model';
import { Api } from '../../service/api';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-painel-curriculos',
  imports: [FormsModule],
  templateUrl: './painel-curriculos.html',
  styleUrl: './painel-curriculos.scss',
})
export class PainelCurriculos implements OnInit {
  // curriculo vazio para o formulário
  public curriculo: Curriculo = new Curriculo('', '', '', '', '', '', '', 0, '', '');

  public curriculos: Curriculo[] = [];

  constructor(private _apiService: Api) {}

  ngOnInit(): void {
    this.listarCurriculos();
  }

  listarCurriculos(): void {
    this._apiService.getCurrículos().subscribe((retornaCurriculos) => {
      this.curriculos = retornaCurriculos.map((e) => {
        return new Curriculo(
          e.id,
          e.usuarioId,
          e.candidato,
          e.email,
          e.telefone,
          e.formacao,
          e.universidade,
          e.anoFormacao,
          e.experiencia,
          e.habilidades
        );
      });
    });
  }

  // Carrega o currículo selecionado na tabela para o formulário (igual ao selecionarVaga)
  selecionarCurriculo(curriculo: Curriculo): void {
    this.curriculo = new Curriculo(
      curriculo.id,
      curriculo.usuarioId,
      curriculo.candidato,
      curriculo.email,
      curriculo.telefone,
      curriculo.formacao,
      curriculo.universidade,
      curriculo.anoFormacao,
      curriculo.experiencia,
      curriculo.habilidades
    );
  }

  cadastrarCurriculo(): void {
    if (!this.curriculo.candidato || !this.curriculo.email) {
      alert('Preencha os campos obrigatórios!');
      return;
    }

    // Remove o id para o json-server gerar automaticamente
    const novo = new Curriculo(
      '',
      this.curriculo.usuarioId || '1',
      this.curriculo.candidato,
      this.curriculo.email,
      this.curriculo.telefone,
      this.curriculo.formacao,
      this.curriculo.universidade,
      this.curriculo.anoFormacao,
      this.curriculo.experiencia,
      this.curriculo.habilidades
    );

    this._apiService.cadastrarCurriculo(novo).subscribe(() => {
      this.limparFormulario();
      alert('Currículo Cadastrado com Sucesso!');
      this.listarCurriculos();
    });
  }

  atualizarCurriculo(id: string): void {
    if (!id) {
      alert('Selecione um currículo para atualizar!');
      return;
    }

    this._apiService.atualizarCurriculo(id, this.curriculo).subscribe(() => {
      this.limparFormulario();
      alert('Currículo Atualizado com Sucesso!');
      this.listarCurriculos();
    });
  }

  excluirCurriculo(id: string): void {
    if (!id) {
      alert('Selecione um currículo para excluir!');
      return;
    }

    const confirmar = confirm('Tem certeza que deseja excluir este currículo?');
    if (!confirmar) return;

    this._apiService.removerCurriculo(id).subscribe(() => {
      this.limparFormulario();
      alert('Currículo Excluído com Sucesso!');
      this.listarCurriculos();
    });
  }

  limparFormulario(): void {
    this.curriculo = new Curriculo('', '', '', '', '', '', '', 0, '', '');
  }
}
