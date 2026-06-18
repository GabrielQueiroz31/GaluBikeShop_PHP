import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/eco_provider.dart';
import '../widgets/habito_card.dart';

class HabitosScreen extends StatelessWidget {
  const HabitosScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = context.watch<EcoProvider>();

    return DefaultTabController(
      length: 2,
      child: Column(
        children: [
          const TabBar(
            labelColor: Colors.green,
            tabs: [
              Tab(text: 'Pendentes'),
              Tab(text: 'Concluídos'),
            ],
          ),
          Expanded(
            child: TabBarView(
              children: [
                ListView(
                  padding: const EdgeInsets.all(12),
                  children: provider.pendentes
                      .map((habito) => HabitoCard(habito: habito))
                      .toList(),
                ),
                ListView(
                  padding: const EdgeInsets.all(12),
                  children: provider.concluidos
                      .map((habito) => HabitoCard(habito: habito))
                      .toList(),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}