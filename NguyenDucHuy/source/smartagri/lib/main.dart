// ignore_for_file: avoid_print, non_constant_identifier_names

import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';
import 'package:internet_connection_checker/internet_connection_checker.dart';
import 'package:lottie/lottie.dart';

import 'package:smartagri/ManagerScreen.dart';
import 'package:smartagri/Screen/LoginScreen.dart';

import 'package:flutter/services.dart';
import 'package:smartagri/Screen/SplashScreen.dart';

import 'data/data_sheet_api.dart';
import 'helper/dialogLoading.dart';

Future <void> main() async {

  runApp(const SplashScreen());
  
  WidgetsFlutterBinding.ensureInitialized();
  await Firebase.initializeApp();

  InternetConnectionChecker().onStatusChange.listen((event) async {
    switch (event) {
      case InternetConnectionStatus.connected:
        try{
          // print("Name ${FirebaseAuth.instance.currentUser!.displayName}" );
          print('YAY! Connect internet success!');
          final currentUser  = FirebaseAuth.instance.currentUser!.displayName;
          if (currentUser != ""){
            // IF Get Current User NAME (DataSheet Name) => Init Sheet
            await DataSheetApi.init(currentUser!).whenComplete(() {
              print('Init Success');
            });
          }
        }catch (e){
          print(e);
        }
        runApp(const MyApp());
        break;
      case InternetConnectionStatus.disconnected:
        print('You are disconnected from the internet.');
        print('No internet :( Reason:');
        runApp(const NoConnect());
        break;
    }
  });
}


class MyApp extends StatefulWidget {
  const MyApp({super.key});

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {

  bool checkLogin = true;

  @override
  void initState() {
    super.initState();
    if (FirebaseAuth.instance.currentUser != null) {
      // signed in
      print("signed in");
      setState(() {
        checkLogin = true;
      });
    } else {
      // signed out   
      print("signed out");
      checkLogin = false;
    }
  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setPreferredOrientations([
      DeviceOrientation.portraitUp,
      DeviceOrientation.portraitDown,
    ]);
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'NTU SmartAgri',
      theme: ThemeData(
        fontFamily: 'Montserrat',
        primarySwatch: Colors.blue,
      ),
      home: checkLogin?  const ManagerScreen(): const LoginScreen()
    );
  }
}

class NoConnect extends StatelessWidget {
  const NoConnect({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    SystemChrome.setPreferredOrientations([
      DeviceOrientation.portraitUp,
      DeviceOrientation.portraitDown,
    ]);
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'NTU SmartAgri',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const NoConnectInternet(),
    );
  }
}
class NoConnectInternet extends StatelessWidget {
  const NoConnectInternet({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      resizeToAvoidBottomInset: true,
      // resizeToAvoidBottomPadding: false,
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            Container(
              decoration: BoxDecoration(
                color: Colors.grey[300],
                borderRadius: BorderRadius.circular(1000),
                boxShadow: [
                  BoxShadow(
                    color: Colors.grey.withOpacity(0.5),
                    spreadRadius: 5,
                    blurRadius: 7,
                    offset: const Offset(0, 3),
                  ),
                ],
              ),
              child: Lottie.asset("assets/lotties/no-internetV1.json",
                width: MediaQuery.of(context).size.width -80,
                height: MediaQuery.of(context).size.width -120,
                fit: BoxFit.fill,
              ),
            ),

            Padding(
              padding: const EdgeInsets.only(top:40,left: 30, right: 30),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  const Text('Oops!!!',style: TextStyle(fontSize: 40,fontWeight: FontWeight.bold, color: Colors.black),),
                  const SizedBox(height: 5,),
                  const Text('Please check your internet connection and try again',
                    style: TextStyle(fontSize: 20,fontWeight: FontWeight.normal, color: Colors.black),
                    textAlign: TextAlign.center,
                  ),
                  
                  const SizedBox(height: 40,),

                  ButtonTryAgain(context)
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
  
  void tapTryAgain(BuildContext context){
    diaLogLoading(context,true);
  }

  Widget ButtonTryAgain (BuildContext context)=> GestureDetector(
    onTap: ()=> tapTryAgain(context),
    child: Container(
      decoration: BoxDecoration(
        borderRadius: BorderRadius.circular(100),
        color: Colors.black,
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.5),
            spreadRadius: 5,
            blurRadius: 7,
            offset: const Offset(0, 3),
          ),
        ],
      ),
      child: const Padding(
        padding: EdgeInsets.symmetric(horizontal: 60, vertical: 10),
        child: Text("Try Again",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color: Colors.white),),
      ),
    ),
  );
}


