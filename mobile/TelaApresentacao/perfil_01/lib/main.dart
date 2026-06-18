import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Meu Perfil',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(primarySwatch: Colors.blue),
      home: const TelaInicial(),
    );
  }
}

// Tela com o menu de navegação embaixo
class TelaInicial extends StatefulWidget {
  const TelaInicial({super.key});

  @override
  State<TelaInicial> createState() => _TelaInicialState();
}

class _TelaInicialState extends State<TelaInicial> {
  int _paginaAtual = 1; // começa na tela de perfil

  final List<Widget> _paginas = const [
    TelaHome(),
    TelaPerfil(),
    TelaNotificacoes(),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: _paginas[_paginaAtual],
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _paginaAtual,
        onTap: (index) {
          setState(() {
            _paginaAtual = index;
          });
        },
        selectedItemColor: Colors.blue,
        unselectedItemColor: Colors.grey,
        items: const [
          BottomNavigationBarItem(icon: Icon(Icons.home), label: 'Início'),
          BottomNavigationBarItem(icon: Icon(Icons.person), label: 'Perfil'),
          BottomNavigationBarItem(
              icon: Icon(Icons.notifications), label: 'Notificações'),
        ],
      ),
    );
  }
}

// ── Tela de Perfil ──────────────────────────────────

class TelaPerfil extends StatelessWidget {
  const TelaPerfil({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Meu Perfil'),
        backgroundColor: Colors.blue,
        foregroundColor: Colors.white,
      ),
      body: SingleChildScrollView(
        child: Column(
          children: [
            // Bloco do topo com foto e nome
            Container(
              width: double.infinity,
              color: Colors.blue,
              padding: const EdgeInsets.all(24),
              child: Column(
                children: [
                  // Foto de perfil
                  CircleAvatar(
                    radius: 50,
                    backgroundColor: Colors.white,
                    child: Icon(Icons.person, size: 60, color: Colors.blue),
                  ),
                  const SizedBox(height: 12),
                  // Nome
                  const Text(
                    'Gabriel Gomes',
                    style: TextStyle(
                      fontSize: 22,
                      fontWeight: FontWeight.bold,
                      color: Colors.white,
                    ),
                  ),
                  const SizedBox(height: 6),
                  // Descrição
                  const Text(
                    'Tenho 17 anos, gosto de programar e assistir esportes',
                    textAlign: TextAlign.center,
                    style: TextStyle(
                      fontSize: 13,
                      color: Colors.white70,
                    ),
                  ),
                ],
              ),
            ),

            const SizedBox(height: 12),

            // Linha de estatísticas
            Padding(
              padding: const EdgeInsets.symmetric(horizontal: 12),
              child: Row(
                children: [
                  _CardEstatistica(numero: '12', titulo: 'Projetos'),
                  const SizedBox(width: 8),
                  _CardEstatistica(numero: '348', titulo: 'Seguidores'),
                  const SizedBox(width: 8),
                  _CardEstatistica(numero: '127', titulo: 'Seguindo'),
                ],
              ),
            ),

            const SizedBox(height: 16),

            // Ícones de redes sociais
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceEvenly,
              children: const [
                _IconeRede(icone: Icons.camera_alt, nome: 'Instagram', cor: Color(0xFFE1306C)),
                _IconeRede(icone: Icons.work, nome: 'LinkedIn', cor: Color(0xFF0077B5)),
                _IconeRede(icone: Icons.close, nome: 'Twitter', cor: Colors.black),
                _IconeRede(icone: Icons.terminal, nome: 'GitHub', cor: Color(0xFF333333)),
              ],
            ),

            const SizedBox(height: 16),
            const Divider(),

            // Lista de informações pessoais
            _LinhaInfo(icone: Icons.location_on, titulo: 'Localização', valor: 'Santa Barabra do Oeste, SP'),
            _LinhaInfo(icone: Icons.business, titulo: 'Empresa', valor: 'Estudante'),
            _LinhaInfo(icone: Icons.school, titulo: 'Formação', valor: 'Tecnico em Desenvolvimento de Sistemas'),
            _LinhaInfo(icone: Icons.star, titulo: 'Habilidades', valor: 'Python, Java, Html'),
            _LinhaInfo(icone: Icons.email, titulo: 'E-mail', valor: 'gabriel@email.com'),
          ],
        ),
      ),
    );
  }
}

// ── Widgets reutilizáveis ──────────────────────────

class _CardEstatistica extends StatelessWidget {
  final String numero;
  final String titulo;

  const _CardEstatistica({required this.numero, required this.titulo});

  @override
  Widget build(BuildContext context) {
    return Expanded(
      child: Container(
        height: 70,
        decoration: BoxDecoration(
          color: Colors.blue,
          borderRadius: BorderRadius.circular(10),
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              numero,
              style: const TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
                color: Colors.white,
              ),
            ),
            Text(
              titulo,
              style: const TextStyle(fontSize: 12, color: Colors.white70),
            ),
          ],
        ),
      ),
    );
  }
}

class _IconeRede extends StatelessWidget {
  final IconData icone;
  final String nome;
  final Color cor;

  const _IconeRede({
    required this.icone,
    required this.nome,
    required this.cor,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        IconButton(
          onPressed: () {},
          icon: Icon(icone, color: cor, size: 30),
        ),
        Text(nome, style: const TextStyle(fontSize: 11)),
      ],
    );
  }
}

class _LinhaInfo extends StatelessWidget {
  final IconData icone;
  final String titulo;
  final String valor;

  const _LinhaInfo({
    required this.icone,
    required this.titulo,
    required this.valor,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        ListTile(
          leading: Icon(icone, color: Colors.blue),
          title: Text(
            titulo,
            style: const TextStyle(fontWeight: FontWeight.bold),
          ),
          subtitle: Text(valor),
        ),
        const Divider(height: 1, indent: 16, endIndent: 16),
      ],
    );
  }
}

// ── Telas secundárias ──────────────────────────────

class TelaHome extends StatelessWidget {
  const TelaHome({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(
        child: Text('Tela Início', style: TextStyle(fontSize: 20)),
      ),
    );
  }
}

class TelaNotificacoes extends StatelessWidget {
  const TelaNotificacoes({super.key});

  @override
  Widget build(BuildContext context) {
    return const Scaffold(
      body: Center(
        child: Text('Tela Notificações', style: TextStyle(fontSize: 20)),
      ),
    );
  }
}