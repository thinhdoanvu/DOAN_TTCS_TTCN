// ignore_for_file: file_names, must_be_immutable, no_logic_in_create_state, avoid_print, non_constant_identifier_names

import 'dart:async';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/data/datasetField.dart';
import 'package:smartagri/helper/ChangeFloatToDate.dart';

class HomeScreen extends StatefulWidget {
  List <DataSet> dataHome;
  HomeScreen({Key? key, required this.dataHome}) : super(key: key);

  @override
  State<HomeScreen> createState() => _HomeScreenState(dataHome);
}

class _HomeScreenState extends State<HomeScreen> {

  final List <DataSet> dataHome;
  _HomeScreenState(this.dataHome);
  
  @override
  void initState() {
    super.initState();

    print(Changes().getTime(dataHome[0].time!));
    getProfileUser();
  }

  String plant = "";

  late StreamSubscription <QuerySnapshot> _eventsSubscription;  

  Future<void> getProfileUser () async {
    try{
      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      _eventsSubscription  =   users
        .snapshots(includeMetadataChanges: true)
        .listen((querySnapshot){
          for (var doc in querySnapshot.docs) {
            if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
            {
              setState(() { plant = doc["Plant"]; });
              print("plant: $plant", );
            }
          }
      });
    }catch (error){
      print(error.toString());
    }
  }

  @override
  void dispose() {
    // Cancel your subscription when the screen is disposed
    print(" Cancle Listener Firestore   Home  Screen");
    _eventsSubscription.cancel();
    _eventsSubscription.pause();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Center(
        child: Container(
            width: MediaQuery.of(context).size.width,
            decoration:  const BoxDecoration(
              color: Colors.white,
            ),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                Flexible(
                  child:
                  ListView(
                    children: <Widget>[
                      const Text(''),
                      Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        crossAxisAlignment: CrossAxisAlignment.center,
                        children: [
                          //---------- Hien thi thoi gian, ngay thang va logo Smart Agri--------------
                          Taskbar(),

                          //------------------Text Title Screen -------------------
                          Padding(
                            padding: const EdgeInsets.only(top: 30),
                            child: TextHome('Sensor parameters', 28, true,Colors.black),
                          ),

                          // -------------Table thông số-------------------
                          Padding(
                            padding: const EdgeInsets.only(top: 25),
                            child: PanelHome(),
                          ),

                          // -----------------chú thích và ảnh cây trồng----------------
                          NoteDetail(),
                        ],
                      ),
                    ],
                  )
                ),
              ],
            ),
          ),
      ),
    );
  }

  Widget NoteDetail()=>Padding(
    padding: const EdgeInsets.only(top:20, bottom: 30),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.spaceAround,
      children: [
        Container(
          decoration: BoxDecoration(
            borderRadius: BorderRadius.circular(30),
            boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.5),
                spreadRadius: 5,
                blurRadius: 7,
                offset: const Offset(0, 3),
              ),
            ],

          ),
          child: ClipRRect(
            borderRadius: BorderRadius.circular(33),
            child: plant == ""?
            Image.asset( 'assets/images/sanhan_tim.png', 
                  width: MediaQuery.of(context).size.width/2-60,
                  height: MediaQuery.of(context).size.width/2-60,
                  fit: BoxFit.fill
                )
              :
            FadeInImage(
              image: NetworkImage(plant),
              placeholder: const AssetImage('assets/images/null.png'),
              imageErrorBuilder: (context, error, stackTrace) {
                return Image.asset( 'assets/images/sanhan_tim.png', 
                  width: MediaQuery.of(context).size.width/2-60,
                  height: MediaQuery.of(context).size.width/2-60,
                  fit: BoxFit.fill
                );
              },
              width: MediaQuery.of(context).size.width/2-60,
              height: MediaQuery.of(context).size.width/2-60,
              fit: BoxFit.fill,
            )
          ),
        ),

        Container(
          height: MediaQuery.of(context).size.width/2-60,
          decoration: BoxDecoration(
              color: Colors.grey[200],
              borderRadius: BorderRadius.circular(25),
              boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.5),
                spreadRadius: 5,
                blurRadius: 7,
                offset: const Offset(0, 3),
              ),
            ],
          ),
          child: Padding(
            padding: const EdgeInsets.only(top: 10,bottom: 10,left: 10,right: 6),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Row(
                  children: const [
                    Icon(Icons.thermostat,size: 25),
                    Text(' Temp  ',style: TextStyle(fontSize: 18),),
                    Text('℃',style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color: Colors.red),)
                  ],
                ),

                Padding(
                  padding: const EdgeInsets.only(top:10,bottom: 10),
                  child: Row(
                    children: const[
                      Icon(Icons.water_drop,size: 25),
                      Text(' Humidity ',style: TextStyle(fontSize: 18),),
                      Text("%",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color: Colors.blue),)
                    ],
                  ),
                ),

                Row(
                  children: const[
                    Icon(Icons.light_mode,size: 25,),
                    Text(' Light ',style: TextStyle(fontSize: 18),),
                    Text("lux ",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color: Colors.green),)
                  ],
                ),
              ],
            ),
          ),
        ),
      ],
    ),
  );

  Widget Taskbar() =>Padding(
    padding: const EdgeInsets.only(top:40,left: 0,right: 0),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.spaceAround,
      children: [

        Column(
          mainAxisAlignment: MainAxisAlignment.start,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            //---------------------date time-------------
            Row(
              children: [
                Text(Changes().getTime12h(dataHome[0].time!),style: const TextStyle(fontSize: 40),),

                Padding(
                  padding: const EdgeInsets.only(top: 16),
                  child: Text('${Changes().getAMPM(dataHome[0].time!)} ',style: const TextStyle(fontSize: 12),),
                ),

                Changes().getIcon(dataHome[0].time!) == 'AM'?
                const Icon(Icons.wb_sunny_outlined,size:24):
                const Icon(Icons.bedtime_outlined,size:  24),

              ],
            ),

            Padding(
              padding: const EdgeInsets.only(top: 10),
              child: Row(
                children: [
                  const Icon(Icons.calendar_month_rounded,size: 20,),
                  Text('  ${Changes().DateChange(dataHome[0].date.toString())}')
                ],
              ),
            )
          ],
        ),
        // ---------------------logo ----------------------
        Container(
          height: MediaQuery.of(context).size.width/2-75,
          width: MediaQuery.of(context).size.width/2-75  ,
          decoration: BoxDecoration(
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
          child: Image.asset('assets/images/smartAgri.png'),
        ),
      ],
    ),
  );

  Widget Title()=>Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
      Container(
        width: MediaQuery.of(context).size.width,
        height: MediaQuery.of(context).size.width*1/4,
        decoration: BoxDecoration(
          color: Colors.deepPurple[200],
          borderRadius:const  BorderRadius.only(bottomRight: Radius.circular(75),bottomLeft: Radius.circular(75))
        ),
      ),
      Padding(
        padding: const EdgeInsets.only(left: 80,),
        child: Container(
          width: MediaQuery.of(context).size.width*1/3,
          height: MediaQuery.of(context).size.width*1/6,
          decoration: BoxDecoration(
              color: Colors.deepPurple[200],
              borderRadius: const BorderRadius.only(bottomRight: Radius.circular(75),bottomLeft: Radius.circular(75))
          ),
        ),
      )
    ],
  );

  Widget PanelHome()=>Padding(
    padding: const EdgeInsets.only(bottom: 25),
    child: Container(
      width: MediaQuery.of(context).size.width-50,
      decoration: BoxDecoration(
        color: Colors.grey[200],
        borderRadius: BorderRadius.circular(25),
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.5),
            spreadRadius: 5,
            blurRadius: 7,
            offset:const  Offset(0, 3),
          ),
        ],
      ),

      child: Padding(
        padding: const EdgeInsets.only(top:30,left: 30,right: 30,bottom: 20),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: [
            Column(
              children: const [
              Text(''),
              Padding(
                padding: EdgeInsets.only(top: 25,bottom: 20),
                child: Text('Area 1',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold),),
              ),
              Text('Area 2',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold)),
              Padding(
                padding: EdgeInsets.only(bottom: 15,top:20),
                child: Text('Area 3',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold)),
              ),
            ],),

            RowPanel(1, 
              num.parse(Changes().Humidity(dataHome[0].temperature1.toString())), 
              num.parse(Changes().Humidity(dataHome[0].temperature2.toString())), 
              num.parse(Changes().Humidity(dataHome[0].temperature3.toString()))),
            RowPanel(2, 
              num.parse(Changes().Div10(dataHome[0].humidity1!)), 
              num.parse(Changes().Div10(dataHome[0].humidity2!)), 
              num.parse(Changes().Div10(dataHome[0].humidity3!))),
            RowPanel(3, 
              num.parse(dataHome[0].light1!.toString()), 
              num.parse(dataHome[0].light2!.toString()), 
              num.parse(dataHome[0].light3!.toString())
            ),

          ],
        ),
      )
    ),
  );

  Widget RowPanel(int stt, num n1, num n2, num n3)=>Column(
    children: [
      stt==1? const Icon(Icons.thermostat,size: 25,):
          stt==2? const Icon(Icons.water_drop,size: 25)
              : const Icon(Icons.light_mode,size:25),

      Padding(
        padding: const EdgeInsets.only(top:20,bottom: 20),
        child: Text(n1.toString(),style: const TextStyle(fontSize: 16,)),
      ),

      Text(n2.toString(),style: const TextStyle(fontSize: 16,)),

      Padding(
        padding: const EdgeInsets.only(bottom: 20,top:20),
        child: Text(n3.toString(),style: const TextStyle(fontSize: 16,)),
      )
    ],
  );

  Widget TextHome(String s, double size,bool checkFontWeight,Color color)=>
      checkFontWeight? Text(s,style: TextStyle(fontSize: size,fontWeight: FontWeight.bold,color: color),)
    : Text(s,style: TextStyle(fontSize: size,color: color),);

}
