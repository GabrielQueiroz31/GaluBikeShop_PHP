import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/eco_provider.dart';
import '../widgets/dashboard_card.dart';

class DashboardScreen extends StatelessWidget {
  const DashboardScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = context.watch<EcoProvider>();

    return Padding(
      padding: const EdgeInsets.all(12),
      child: GridView.count(
        crossAxisCount: 2,
        children: [
          DashboardCard(
            titulo: 'Concluídos',
            valor: '${provider.totalConcluidos}',
            icone: Icons.check_circle,
          ),
          DashboardCard(
            titulo: 'Pendentes',
            valor: '${provider.totalPendentes}',
            icone: Icons.pending_actions,
          ),
          DashboardCard(
            titulo: 'Pontos',
            valor: '${provider.pontuacao}',
            icone: Icons.stars,
          ),
          DashboardCard(
            titulo: 'Meta semanal',
            valor: '${(provider.metaSemanal * 100).toInt()}%',
            icone: Icons.flag,
          ),
          DashboardCard(
            titulo: 'Nível',
            valor: provider.nivel,
            icone: Icons.eco,
          ),
          DashboardCard(
            titulo: 'Impacto',
            valor: '${provider.totalConcluidos * 0.5} kg',
            icone: Icons.public,
          ),
        ],
      ),
    );
  }
}