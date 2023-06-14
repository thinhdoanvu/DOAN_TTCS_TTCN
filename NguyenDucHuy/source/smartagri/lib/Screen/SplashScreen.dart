// ignore_for_file: file_names

import 'package:flutter/material.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';

class SplashScreen extends StatelessWidget {
  const SplashScreen({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'NTU SmartAgri',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const SplashScreenSTF(),
    );
  }
}

class SplashScreenSTF extends StatefulWidget {
  const SplashScreenSTF({super.key});

  @override
  State<SplashScreenSTF> createState() => _SplashScreenSTFState();
}

class _SplashScreenSTFState extends State<SplashScreenSTF> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: const BoxDecoration(
          color: Colors.white
        ),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            SizedBox(
              width: MediaQuery.of(context).size.width ,
              height: MediaQuery.of(context).size.width ,
              child: Image.asset("assets/images/smartAgri.png")
            ),
            const SizedBox(height: 50,),

            const SizedBox(
              width: 100,
              height: 100,
              child: Center(
                child: SpinKitChasingDots(
                  color: Colors.deepPurpleAccent,
                  size: 80.0,
                ),
              ),
            )
          ],
        ),
      ),
    );
  }
}