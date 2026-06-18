import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../models/habito.dart';
import '../providers/eco_provider.dart';

class HabitoCard extends StatelessWidget {
  final Habito habito;

  const HabitoCard({
    super.key,
    required this.habito,
  });

  @override
  Widget build(BuildContext context) {
    return Card(
      child: ListTile(
        leading: Text(
          habito.icone,
          style: const TextStyle(fontSize: 28),
        ),
        title: Text(habito.titulo),
        trailing: habito.concluido
            ? const Icon(Icons.check_circle, color: Colors.green)
            : IconButton(
                icon: const Icon(Icons.check_circle_outline),
                onPressed: () {
                  context.read<EcoProvider>().concluirHabito(habito);
                },
              ),
      ),
    );
  }
}