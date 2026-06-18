import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'providers/eco_provider.dart';
import 'views/splash_screen.dart';

void main() {
  runApp(
    ChangeNotifierProvider(
      create: (_) => EcoProvider(),
      child: const EcoTrackApp(),
    ),
  );
}

class EcoTrackApp extends StatelessWidget {
  const EcoTrackApp({super.key});

  @override
  Widget build(BuildContext context) {
    final provider = Provider.of<EcoProvider>(context);

    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'EcoTrack',
      themeMode: provider.temaEscuro ? ThemeMode.dark : ThemeMode.light,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.green),
        useMaterial3: true,
      ),
      darkTheme: ThemeData(
        colorScheme: ColorScheme.fromSeed(
          seedColor: Colors.green,
          brightness: Brightness.dark,
        ),
        useMaterial3: true,
      ),
      home: const SplashScreen(),
    );
  }
}