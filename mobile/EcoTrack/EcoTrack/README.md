# Documento de Requisitos de Software (SRS)
## ISO/IEC/IEEE 29148
## Projeto: EcoTrack

---

# 1. Introdução

## 1.1 Objetivo

Este documento tem como objetivo apresentar os requisitos do aplicativo EcoTrack, desenvolvido em Flutter, utilizando arquitetura MVC simples e gerenciamento de estado com Provider.

## 1.2 Escopo

O EcoTrack é um aplicativo mobile para acompanhamento de hábitos sustentáveis. O sistema permite visualizar hábitos pendentes, marcar hábitos como concluídos, acompanhar métricas ambientais no dashboard e alterar configurações básicas do usuário.

## 1.3 Tecnologias Utilizadas

- Flutter
- Dart
- Provider
- Material Design

---

# 2. Visão Geral do Sistema

## 2.1 Descrição Geral

O aplicativo EcoTrack foi desenvolvido para incentivar ações sustentáveis no dia a dia, como economizar água, separar lixo reciclável, usar transporte coletivo e reduzir desperdícios.

## 2.2 Público-Alvo

Usuários interessados em melhorar seus hábitos sustentáveis e acompanhar seu progresso ambiental.

## 2.3 Funcionalidades Gerais

- Tela inicial de apresentação
- Tela de dashboard ambiental
- Tela de hábitos sustentáveis
- Tela de configurações
- Navegação por BottomNavigationBar
- Menu lateral Drawer
- Gerenciamento de estado com Provider
- Organização em MVC simples

---

# 3. Requisitos Funcionais

## RF01 - Tela Inicial

O sistema deve apresentar uma tela inicial com o nome do aplicativo, descrição da proposta e botão para acessar o app.

## RF02 - Navegação Principal

O sistema deve permitir a navegação entre Dashboard, Hábitos e Configurações por meio do BottomNavigationBar.

## RF03 - Menu Lateral

O sistema deve possuir um Drawer com opções de navegação.

## RF04 - Listagem de Hábitos

O sistema deve exibir uma lista de hábitos sustentáveis pendentes.

## RF05 - Conclusão de Hábitos

O usuário deve poder marcar um hábito como concluído.

## RF06 - Separação por Abas

A tela de hábitos deve possuir abas para hábitos pendentes e hábitos concluídos.

## RF07 - Dashboard Ambiental

O sistema deve exibir cards com informações como hábitos concluídos, hábitos pendentes, pontuação, meta semanal, nível do usuário e impacto estimado.

## RF08 - Atualização Automática

O dashboard deve ser atualizado automaticamente quando um hábito for concluído.

## RF09 - Configurações

O sistema deve permitir alterar o nome do usuário, ativar/desativar modo escuro e redefinir o progresso.

---

# 4. Requisitos Não Funcionais

## RNF01 - Usabilidade

A interface deve ser simples, organizada e intuitiva.

## RNF02 - Responsividade

O aplicativo deve se adaptar a diferentes tamanhos de tela.

## RNF03 - Organização

O código deve ser organizado em pastas separando models, controllers, providers, views e widgets.

## RNF04 - Manutenibilidade

O uso da arquitetura MVC simples deve facilitar a manutenção e evolução do sistema.

## RNF05 - Desempenho

O aplicativo deve responder às ações do usuário sem travamentos principais.

---

# 5. Arquitetura do Sistema

## 5.1 Padrão Utilizado

O projeto utiliza arquitetura MVC simples:

- Model: representa os dados do sistema
- Controller: contém regras de negócio
- View: representa as telas do aplicativo
- Provider: controla o estado global da aplicação

```md
## 5.2 Estrutura de Pastas

```txt
lib/
├── main.dart
├── controllers/
│   └── habito_controller.dart
├── models/
│   └── habito.dart
├── providers/
│   └── eco_provider.dart
├── views/
│   ├── config_screen.dart
│   ├── dashboard_screen.dart
│   ├── habitos_screen.dart
│   ├── home_screen.dart
│   └── splash_screen.dart
└── widgets/
    ├── dashboard_card.dart
    └── habito_card.dart---
```
---

# 6. Descrição dos Arquivos

## main.dart

Arquivo principal da aplicação. Inicializa o app, configura o Provider e define o tema claro ou escuro.

## models/habito.dart

Contém a classe `Habito`, responsável por representar cada hábito sustentável.

## controllers/habito_controller.dart

Contém a lógica para concluir hábitos e redefinir o progresso.

## providers/eco_provider.dart

Gerencia o estado global da aplicação, armazenando hábitos, nome do usuário, tema, página atual e dados do dashboard.

## views/splash_screen.dart

Tela inicial de apresentação do aplicativo.

## views/home_screen.dart

Tela principal que contém `AppBar`, `Drawer`, `BottomNavigationBar` e controla a navegação entre as páginas.

## views/dashboard_screen.dart

Tela responsável por exibir os cards com resumo ambiental.

## views/habitos_screen.dart

Tela que exibe os hábitos pendentes e concluídos usando abas e listas.

## views/config_screen.dart

Tela de configurações do usuário.

## widgets/habito_card.dart

Componente visual reutilizável para exibir um hábito.

## widgets/dashboard_card.dart

Componente visual reutilizável para exibir uma métrica do dashboard.

---

# 7. Interface do Sistema

## 7.1 Widgets Utilizados

O aplicativo utiliza os seguintes widgets principais:

- `Scaffold`
- `AppBar`
- `Drawer`
- `BottomNavigationBar`
- `TabBarView`
- `ListView`
- `GridView`
- `Card`
- `ListTile`
- `SwitchListTile`
- `TextField`
- `ElevatedButton`

## 7.2 Protótipo

Protótipo desenvolvido no Figma:

https://www.figma.com/design/rjIwNMyLD5GnTH1gxHDmMy/EcoTrack---Prot%C3%B3tipo-M%C3%A9dia-Fidelidade

---

# 8. Funcionalidades Implementadas

- Exibição da tela inicial
- Navegação entre telas
- Drawer com menu lateral
- Dashboard com `GridView`
- Lista de hábitos com `ListView`
- Abas com `TabBarView`
- Marcação de hábitos concluídos
- Atualização automática dos dados
- Alteração do nome do usuário
- Alternância entre tema claro e escuro
- Reset do progresso

---

# 9. Como Executar

```bash
flutter pub get
flutter run
=======
# ecotrack

A new Flutter project.

## Getting Started

This project is a starting point for a Flutter application.

A few resources to get you started if this is your first Flutter project:

- [Learn Flutter](https://docs.flutter.dev/get-started/learn-flutter)
- [Write your first Flutter app](https://docs.flutter.dev/get-started/codelab)
- [Flutter learning resources](https://docs.flutter.dev/reference/learning-resources)

For help getting started with Flutter development, view the
[online documentation](https://docs.flutter.dev/), which offers tutorials,
samples, guidance on mobile development, and a full API reference.
>>>>>>> ae4f3d5 (Correção do main e splash_screen)
