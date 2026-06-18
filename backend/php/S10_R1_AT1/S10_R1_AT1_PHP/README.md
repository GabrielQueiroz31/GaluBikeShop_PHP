# Empresa XPTO123 - Mini Sistema PHP

## Sobre o Projeto

Este projeto foi desenvolvido em PHP como parte do desafio profissional inicial.

O sistema simula um formulário de contato empresarial onde o usuário pode enviar:

- Nome
- E-mail
- Mensagem

As informações são armazenadas utilizando **sessão** e o sistema também utiliza **cookies** para salvar preferências do usuário.

---

# Funcionalidades

- Cadastro de informações do usuário
- Armazenamento de dados com sessão
- Preferência de tema claro/escuro com cookie
- Navegação entre páginas
- Contador de visitas
- Sistema organizado em múltiplos arquivos
- Utilização de `include`

---

# Estrutura do Projeto

```txt
S10_R1_AT1
├── footer.php
├── header.php
├── index.php
├── perfil.php
├── style.css
└── tema.php
```

---

# Tecnologias Utilizadas

- PHP
- HTML5
- CSS3

---

# Sessão

O sistema utiliza sessão para armazenar:

- Nome
- E-mail
- Mensagem

Exemplo:

```php
$_SESSION['nome']
```

---

# Cookie

O sistema utiliza cookies para salvar:

- Preferência de tema
- Quantidade de visitas

Exemplo:

```php
setcookie('tema', $tema, time() + (86400 * 30));
```

---

# Navegação

O sistema possui navegação entre páginas utilizando botões e links.

### Páginas do sistema

- `index.php`
- `perfil.php`
- `tema.php`

### Funcionalidades da navegação

- Botão para acessar o perfil
- Botão para voltar ao formulário
- Navegação entre temas claro e escuro

### Exemplo

```php
<a class="btn" href="perfil.php">
    Ir para o Perfil
</a>
```

```php
<a class="btn" href="index.php">
    Voltar
</a>
```

---

# Objetivo do Projeto

Demonstrar conhecimentos iniciais em:

- Sessão
- Cookie
- Navegação entre páginas
- Organização de arquivos
- Estruturação de sistemas em PHP

---

# Autor

Gabriel Gomes de Queiroz
