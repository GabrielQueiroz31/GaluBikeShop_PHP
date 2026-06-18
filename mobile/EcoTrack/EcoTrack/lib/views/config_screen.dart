import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/eco_provider.dart';

class ConfigScreen extends StatelessWidget {
  const ConfigScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = context.watch<EcoProvider>();

    return ListView(
      padding: const EdgeInsets.all(16),
      children: [
        Text(
          'Olá, ${provider.nomeUsuario}',
          style: const TextStyle(fontSize: 22, fontWeight: FontWeight.bold),
        ),

        const SizedBox(height: 20),

        TextField(
          decoration: const InputDecoration(
            labelText: 'Alterar nome',
            border: OutlineInputBorder(),
          ),
          onChanged: provider.alterarNome,
        ),

        const SizedBox(height: 20),

        SwitchListTile(
          title: const Text('Modo escuro'),
          value: provider.temaEscuro,
          onChanged: provider.alterarTema,
        ),

        const SizedBox(height: 20),

        ElevatedButton(
          onPressed: provider.resetarProgresso,
          child: const Text('Redefinir progresso'),
        ),
      ],
    );
  }
}