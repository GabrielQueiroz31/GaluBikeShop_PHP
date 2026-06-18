import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/eco_provider.dart';
import 'dashboard_screen.dart';
import 'habitos_screen.dart';
import 'config_screen.dart';

class HomeScreen extends StatelessWidget {
  const HomeScreen({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = context.watch<EcoProvider>();

    final telas = [
      const DashboardScreen(),
      const HabitosScreen(),
      const ConfigScreen(),
    ];

    return Scaffold(
      appBar: AppBar(
        title: const Text('EcoTrack'),
        actions: [
          const Icon(Icons.notifications),
          const SizedBox(width: 15),
          Center(
            child: Text(
              '${(provider.metaSemanal * 100).toInt()}%',
            ),
          ),
          const SizedBox(width: 15),
        ],
      ),

      drawer: Drawer(
        child: ListView(
          children: [
            const DrawerHeader(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Icon(Icons.eco, size: 60),
                  SizedBox(height: 10),
                  Text(
                    'EcoTrack',
                    style: TextStyle(fontSize: 24),
                  )
                ],
              ),
            ),

            ListTile(
              leading: const Icon(Icons.dashboard),
              title: const Text('Dashboard'),
              onTap: () {
                provider.mudarPagina(0);
                Navigator.pop(context);
              },
            ),

            ListTile(
              leading: const Icon(Icons.checklist),
              title: const Text('Hábitos'),
              onTap: () {
                provider.mudarPagina(1);
                Navigator.pop(context);
              },
            ),

            ListTile(
              leading: const Icon(Icons.settings),
              title: const Text('Configurações'),
              onTap: () {
                provider.mudarPagina(2);
                Navigator.pop(context);
              },
            ),
          ],
        ),
      ),

      body: telas[provider.paginaAtual],

      bottomNavigationBar: BottomNavigationBar(
        currentIndex: provider.paginaAtual,
        onTap: provider.mudarPagina,
        items: const [
          BottomNavigationBarItem(
            icon: Icon(Icons.dashboard),
            label: 'Dashboard',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.checklist),
            label: 'Hábitos',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.settings),
            label: 'Config',
          ),
        ],
      ),
    );
  }
}