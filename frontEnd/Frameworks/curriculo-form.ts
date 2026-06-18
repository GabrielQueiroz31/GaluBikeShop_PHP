import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormBuilder, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { Api } from '../../service/api';
import { Curriculo } from '../../model/curriculo.model';
import { Router } from '@angular/router';

@Component({
  selector: 'app-curriculo-form',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './curriculo-form.html',
  styleUrls: ['./curriculo-form.scss']
})
export class CurriculoForm implements OnInit {
  form!: FormGroup;
  carregando = false;
  mensagem = '';
  tipoMensagem: 'sucesso' | 'erro' = 'sucesso';
  usuarioId = '1'; // usuário simulado

  constructor(
    private formBuilder: FormBuilder,
    private api: Api,
    private router: Router
  ) {}

  ngOnInit() {
    this.inicializarFormulario();
  }

  inicializarFormulario() {
    this.form = this.formBuilder.group({
      candidato:   ['', [Validators.required, Validators.minLength(3)]],
      email:       ['', [Validators.required, Validators.email]],
      telefone:    ['', [Validators.required, Validators.minLength(10)]],
      formacao:    ['', [Validators.required, Validators.minLength(3)]],
      universidade:['', [Validators.required, Validators.minLength(3)]],
      anoFormacao: ['', [Validators.required, Validators.min(1980), Validators.max(new Date().getFullYear())]],
      experiencia: ['', [Validators.required, Validators.minLength(5)]],
      habilidades: ['', [Validators.required, Validators.minLength(5)]]
    });
  }

  salvar() {
    if (this.form.invalid) {
      this.mensagem = 'Preencha todos os campos corretamente';
      this.tipoMensagem = 'erro';
      return;
    }

    this.carregando = true;
    const dados = this.form.value;

    const curriculo = new Curriculo(
      '',
      this.usuarioId,
      dados.candidato,
      dados.email,
      dados.telefone,
      dados.formacao,
      dados.universidade,
      dados.anoFormacao,
      dados.experiencia,
      dados.habilidades
    );

    this.api.cadastrarCurriculo(curriculo).subscribe({
      next: () => {
        this.mensagem = 'Currículo cadastrado com sucesso!';
        this.tipoMensagem = 'sucesso';
        this.form.reset();
        this.carregando = false;
        // Redireciona para o painel de currículos após salvar
        setTimeout(() => this.router.navigate(['/painel-curriculos']), 1500);
      },
      error: () => {
        this.mensagem = 'Erro ao cadastrar currículo';
        this.tipoMensagem = 'erro';
        this.carregando = false;
      }
    });
  }

  cancelar() {
    this.router.navigate(['/painel-curriculos']);
  }

  obterErrosCampo(campo: string): string[] {
    const controle = this.form.get(campo);
    const erros: string[] = [];

    if (controle?.touched) {
      if (controle?.hasError('required')) erros.push('Campo obrigatório');
      if (controle?.hasError('minlength')) erros.push(`Mínimo de ${controle.getError('minlength').requiredLength} caracteres`);
      if (controle?.hasError('email')) erros.push('Email inválido');
      if (controle?.hasError('min') || controle?.hasError('max')) erros.push('Valor inválido');
    }

    return erros;
  }
}
