// ignore_for_file: non_constant_identifier_names, avoid_print, file_names

import 'dart:async';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/Screen/AccoutScreen.dart';
import 'package:smartagri/Screen/ListScreen.dart';
import 'package:smartagri/Screen/HomeScreen.dart';
import 'package:smartagri/Screen/SettingScreen.dart';
import 'package:smartagri/data/datasetField.dart';
import 'package:curved_navigation_bar/curved_navigation_bar.dart';
import 'Screen/ChartScreen.dart';
import 'Screen/Loading.dart';
import 'Screen/LoginScreen.dart';
import 'data/data_sheet_api.dart';


class ManagerScreen extends StatefulWidget {
  const ManagerScreen({Key? key}) : super(key: key);

  @override
  State<ManagerScreen> createState() => _ManagerScreenState();
}

class _ManagerScreenState extends State<ManagerScreen> {

  static List <DataSet> listData = [
    const DataSet(date: '44000', time: '0.231',
      humidity1: 34, humidity2: 32, humidity3: 1,
      temperature1: 1, temperature2: 1, temperature3: 1,
      light1: 1, light2: 1, light3: 1,
      DA_A1_MIN: 1, DA_A1_MAX: 1, DA_A2_MIN: 1, DA_A2_MAX: 1, DA_A3_MIN: 1, DA_A3_MAX: 1,
      ND_A1_MIN: 1, ND_A1_MAX: 1, ND_A2_MIN: 1, ND_A2_MAX: 1, ND_A3_MIN: 1, ND_A3_MAX: 1,
      AS_A1_MIN: 1, AS_A1_MAX: 1, AS_A2_MIN: 1, AS_A2_MAX: 1, AS_A3_MIN: 1, AS_A3_MAX: 1,
      TIME_OFF: 1, TIME_ON: 1,
      TIME_BN1: 1, TIME_BN2: 1, TIME_BN3: 1, TIME_PS1: 1, TIME_PS2: 1, TIME_PS3: 1,
      TIME_AS1: 1, TIME_AS2: 1, TIME_AS3: 1),

  ];
  bool CheckLoadData = false;
  
  List<DataSet> list1=[];
  List<DataSet> list2=[];
  List<DataSet> list3=[];
  List<DataSet> listDataInit=[];

  @override
  void initState() {
    super.initState();
    getDataGgSheet();
    checkAccountExit();
  }
  late StreamSubscription <QuerySnapshot> _eventsSubscription;


  Future<void> checkAccountExit() async {
    try{
      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      _eventsSubscription =  users
        .snapshots(includeMetadataChanges: true)
        .listen((querySnapshot) {
          int dem = 0;
          print(" ------------------------------- CHECK ACCOUNT EXITS ----------------------------------------");
          for (var change in querySnapshot.docs) {
            if( change['RefID'] == FirebaseAuth.instance.currentUser!.uid)
            {
              dem ++ ;
              print("${change['RefID']}   ${change['FullName']} ${change['IsActived']}");
              // -------- IF Active Account  =   FALSE ->  Logout
              if (change['IsActived'] == false){
                logOutRealTime();
              }
            }
          }
          // ------------ IF No  Account Found ->  Logout
          if(dem == 0 ){
            logOutRealTime();
          }
        });
    }catch(error){
      print(error);
    }
  }

  @override
  void dispose() {
    // Cancel your subscription when the screen is disposed
    print(" Cancel Listener Firestore");
    _eventsSubscription.cancel();
    _eventsSubscription.pause();
    super.dispose();
  }


  Future<void> logOutRealTime () async {
    try{
      Navigator.pushAndRemoveUntil(context,
        MaterialPageRoute(builder: (_) =>const  LoginScreen()), (route) => false
      );
    }catch(error){
      print(error);
    }
  }

  Future refreshData() async {
    setState(() {
      CheckLoadData = false;
    });
    getDataGgSheet();
  }




  Future getDataGgSheet() async {
    try {
      final dataTam = await DataSheetApi.getAll();
      print("Name ${FirebaseAuth.instance.currentUser!.displayName}" );

      setState(() {
        listData = dataTam;
        //-----------Data Home--------
        list1.removeRange(0, list1.length);
        list1.add(listData[0]);
        //---------DataChart ------------
        list2.removeRange(0,list2.length);

        for ( int i=0 ; i< 12 ; i++ ){
          list2.add(listData[i]);
        }
        // //---------DataList----------
        listDataInit.removeRange(0,listDataInit.length);
        int lengthList = 10;
        if ( dataTam.length < 100 ) {
          lengthList = dataTam.length ;
        }
        else {
          lengthList = 100;
        }
        for (int i=0;i<  lengthList ;i++) {
          listDataInit.add(listData[i]);
        }

        CheckLoadData = true;
      });

      if(CheckLoadData) {
        print('Loading Data Success');

        setState(() {
          screens =[
            HomeScreen(dataHome: list1),
            ChartScreen(dataHome: list2),
            ListScreen(dataHome: listData, listDataInit: listDataInit),
            SettingScreen(dataHome: list1,),
            const AccountScreen(),
          ];
        });
      }
    } catch (error){
      print("error $error");
    }
  }

  int index=0;
  final items = <Widget>[
    const Icon(Icons.home_rounded, size: 30),
    const Icon(Icons.bar_chart_rounded, size:30),
    const Icon(Icons.format_list_bulleted_rounded, size :30),
    const Icon(Icons.miscellaneous_services_rounded, size: 30),
    const Icon( Icons.account_circle, size: 30),
  ];

  List  screens = [];

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        bottomNavigationBar: Theme(
          data: Theme.of(context).copyWith(
            iconTheme: const IconThemeData(color: Colors.white)
          ),
          child: CurvedNavigationBar(
            color: const Color(0xff6849ef),
            buttonBackgroundColor: const Color(0xff6849ef),
            backgroundColor: Colors.transparent,
            height: 60,
            items: items,
            index: index,
            onTap: (index)=> setState(()=> this.index = index),
          ),
        ),
        body: index == 4? const AccountScreen(): RefreshIndicator(
          onRefresh: refreshData,
          child: CheckLoadData == true  ? screens[index] : const LoadingScreen(),
        )
      ),
    );
  }
}
