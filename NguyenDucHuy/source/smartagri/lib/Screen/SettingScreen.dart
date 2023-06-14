// ignore_for_file: file_names, must_be_immutable, avoid_print, no_logic_in_create_state, non_constant_identifier_names, unnecessary_null_comparison

import 'dart:ui';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';
import 'package:smartagri/data/dataSendField.dart';
import 'package:smartagri/data/data_sheet_api.dart';

import '../data/datasetField.dart';

import 'package:dropdown_button2/dropdown_button2.dart';
import 'package:flutter_switch/flutter_switch.dart';
// import 'package:custom_switch/custom_switch.dart';


// import '../helper/ChangeFloatToDate.dart';

class SettingScreen extends StatefulWidget {
  List <DataSet> dataHome;
  SettingScreen({Key? key, required this.dataHome}) : super(key: key);

  @override
  State<SettingScreen> createState() => _SettingScreenState(dataHome);
}

class _SettingScreenState extends State<SettingScreen> {

  final List <DataSet> dataHome;
  _SettingScreenState(this.dataHome);

  Future<void> initGGSheet () async {
    String currentUser = FirebaseAuth.instance.currentUser!.displayName!;
    if ( currentUser  != ""){
      await DataSheetApi.initSend( "${currentUser}_Setting" );
    }
  }

  @override
  void initState() {
    super.initState();

    initGGSheet();


    if (dataHome[0].TIME_ON!.toInt() >= 10 ) {
      selectedValueStart = "${dataHome[0].TIME_ON!.toInt()}:00";
    } else {
      selectedValueStart = "0${dataHome[0].TIME_ON!.toInt()}:00";
    }

    if (dataHome[0].TIME_OFF!.toInt() >= 10 ) {
      selectedValueEnd = "${dataHome[0].TIME_OFF!.toInt()}:00";
    } else {
      selectedValueEnd = "0${dataHome[0].TIME_OFF!.toInt()}:00";
    }
    print('start $selectedValueStart -> $selectedValueEnd');

    //---------INIT DataSetting
    setState(() {
      //----------DataSended------------------
      DateTime now = DateTime.now();
      dataSended.removeRange(0, dataSended.length);
      dataSended.add('${now.day}/${now.month}/${now.year}');
      dataSended.add('${now.hour}:${now.minute}:${now.second}');
      double t1=0.0;
      t1 = double.parse(dataHome[0].DA_A1_MIN.toString())/10; dataSended.add(t1);
      t1 = double.parse(dataHome[0].DA_A1_MAX.toString())/10; dataSended.add(t1);
      t1 = double.parse(dataHome[0].DA_A2_MIN.toString())/10; dataSended.add(t1);
      t1 = double.parse(dataHome[0].DA_A2_MAX.toString())/10; dataSended.add(t1);
      t1 = double.parse(dataHome[0].DA_A3_MIN.toString())/10; dataSended.add(t1);
      t1 = double.parse(dataHome[0].DA_A3_MAX.toString())/10; dataSended.add(t1);

      t1 = double.parse(dataHome[0].ND_A1_MIN.toString())/10;dataSended.add(t1);
      t1 = double.parse(dataHome[0].ND_A1_MAX.toString())/10;dataSended.add(t1);
      t1 = double.parse(dataHome[0].ND_A2_MIN.toString())/10;dataSended.add(t1);
      t1 = double.parse(dataHome[0].ND_A2_MAX.toString())/10;dataSended.add(t1);
      t1 = double.parse(dataHome[0].ND_A3_MIN.toString())/10;dataSended.add(t1);
      t1 = double.parse(dataHome[0].ND_A3_MAX.toString())/10;dataSended.add(t1);

      dataSended.add(dataHome[0].AS_A1_MIN); dataSended.add(dataHome[0].AS_A1_MAX);
      dataSended.add(dataHome[0].AS_A2_MIN); dataSended.add(dataHome[0].AS_A2_MAX);
      dataSended.add(dataHome[0].AS_A3_MIN); dataSended.add(dataHome[0].AS_A3_MAX);

      dataSended.add(dataHome[0].TIME_OFF); dataSended.add(dataHome[0].TIME_ON);

      dataSended.add(dataHome[0].TIME_BN1); dataSended.add(dataHome[0].TIME_BN2);dataSended.add(dataHome[0].TIME_BN3);
      dataSended.add(dataHome[0].TIME_PS1); dataSended.add(dataHome[0].TIME_PS2);dataSended.add(dataHome[0].TIME_PS3);
      dataSended.add(dataHome[0].TIME_AS1); dataSended.add(dataHome[0].TIME_AS2);dataSended.add(dataHome[0].TIME_AS3);

      ChangeControllerTextInput();
    });
  }

  List dataSended =[];

  // ------------------------------------------ EVENT SEND DATA -------------------------------------- 
  // check is number
  bool isNumeric(String s) {
    if (s == null) {
      return false;
    }
    return double.tryParse(s) != null;
  }

  Future<void> sendData() async {
    try{
      print("--------------------------Data Send ------------------------------");

      //  Connect to Work Sheet SEND DATA
      String currentUser = FirebaseAuth.instance.currentUser!.displayName!;
      if ( currentUser  != ""){
        // await DataSheetApi.initSend( currentUser+"_Setting" );


        DateTime now = DateTime.now();
        dataSended[0] = '${now.day}/${now.month}/${now.year}';
        dataSended[1] = '${now.hour}:${now.minute}:${now.second}';
        print('${dataSended[0]} ${dataSended[1]}');
        print(' - Humidity');
        print('KV1: ${dataSended[2]} ${dataSended[3]}  -KV2: ${dataSended[4]} ${dataSended[5]}  -KV3: ${dataSended[6]} ${dataSended[7]}');
        print(' - Temp');
        print('KV1: ${dataSended[8]} ${dataSended[9]}  -KV2: ${dataSended[10]} ${dataSended[11]}  -KV3: ${dataSended[12]} ${dataSended[13]}');
        print(' - Light');
        print('KV1: ${dataSended[14]} ${dataSended[15]}  -KV2: ${dataSended[16]} ${dataSended[17]}  -KV3: ${dataSended[18]} ${dataSended[19]}');

        print(' - TIME ON-OFF');
        print('-ON: ${dataSended[21]}    OFF: ${dataSended[20]}   ');

        print(' - BƠM: ');
        print('KV1: ${dataSended[22]}   -KV2: ${dataSended[23]}    -KV3: ${dataSended[24]}');

        print(' - PHUN SƯƠNG: ');
        print('KV1: ${dataSended[25]}   -KV2: ${dataSended[26]}    -KV3: ${dataSended[27]}');

        print(' - ĐÈN: ');
        print('KV1: ${dataSended[28]}   -KV2: ${dataSended[29]}    -KV3: ${dataSended[30]}');

        final listTam={
          DataSendSetFields.date : dataSended[0],  DataSendSetFields.time: dataSended[1],

          DataSendSetFields.DA_A1_MIN : dataSended[2] , DataSendSetFields.DA_A1_MAX : dataSended[3] ,
          DataSendSetFields.DA_A2_MIN : dataSended[4] , DataSendSetFields.DA_A2_MAX : dataSended[5] ,
          DataSendSetFields.DA_A3_MIN : dataSended[6] , DataSendSetFields.DA_A3_MAX : dataSended[7] ,

          DataSendSetFields.ND_A1_MIN : dataSended[8] , DataSendSetFields.ND_A1_MAX : dataSended[9] ,
          DataSendSetFields.ND_A2_MIN : dataSended[10] , DataSendSetFields.ND_A2_MAX : dataSended[11] ,
          DataSendSetFields.ND_A3_MIN : dataSended[12] , DataSendSetFields.ND_A3_MAX : dataSended[13] ,

          DataSendSetFields.AS_A1_MIN : dataSended[14] , DataSendSetFields.AS_A1_MAX : dataSended[15] ,
          DataSendSetFields.AS_A2_MIN : dataSended[16] , DataSendSetFields.AS_A2_MAX : dataSended[17] ,
          DataSendSetFields.AS_A3_MIN : dataSended[18] , DataSendSetFields.AS_A3_MAX : dataSended[19] ,

          DataSendSetFields.TIME_OFF : dataSended[20] , DataSendSetFields.TIME_ON : dataSended[21] ,

          DataSendSetFields.TIME_BN1 : dataSended[22] , DataSendSetFields.TIME_BN2 : dataSended[23] , DataSendSetFields.TIME_BN3 : dataSended[24] ,
          DataSendSetFields.TIME_PS1 : dataSended[25] , DataSendSetFields.TIME_PS2 : dataSended[26] , DataSendSetFields.TIME_PS3 : dataSended[27] ,
          DataSendSetFields.TIME_AS1 : dataSended[28] , DataSendSetFields.TIME_AS2 : dataSended[29] , DataSendSetFields.TIME_AS3 : dataSended[30] ,
        };
        await DataSheetApi.insertSend([listTam]).whenComplete(() =>
        {
          Future.delayed(const Duration(milliseconds: 1000), () {
              setState(() {
                print("Send Success");
                Navigator.pop(context);
                AwesomeDialog(
                  context: context,
                  dialogType: DialogType.success,
                  animType: AnimType.scale,
                  // showCloseIcon: true,
                  title: "Done",
                  desc: "Set up successfully",
                  btnOkOnPress: (){}
                ).show(); 
              // Here you can write your code for open new view
              });
          }),
        });
      }   
    } catch  (error){
      print(error);
    }
  }

  void ChangeControllerTextInput(){
    setState(() {
      if(index == 1){
        txtKv1Min.text= dataSended[8].toString();  txtKv2Min.text= dataSended[10].toString() ; txtKv3Min.text= dataSended[12].toString();
        txtKv1Max.text= dataSended[9].toString();  txtKv2Max.text= dataSended[11].toString() ; txtKv3Max.text= dataSended[13].toString();

        if(dataSended[25] ==1) {
          switch1 = false;
        } else {
          switch1 = true;
        }
        if(dataSended[26] ==1) {
          switch2 = false;
        } else {
          switch2 = true;
        }
        if(dataSended[27] ==1) {
          switch3 = false;
        } else {
          switch3 = true;
        }
      }else if (index==2 ){
        txtKv1Min.text= dataSended[2].toString();  txtKv2Min.text= dataSended[4].toString() ; txtKv3Min.text= dataSended[6].toString();
        txtKv1Max.text= dataSended[3].toString();  txtKv2Max.text= dataSended[5].toString() ; txtKv3Max.text= dataSended[7].toString();

        if(dataSended[22] ==1) {
          switch1 = false;
        } else {
          switch1 = true;
        }
        if(dataSended[23] ==1) {
          switch2 = false;
        } else {
          switch2 = true;
        }
        if(dataSended[24] ==1) {
          switch3 = false;
        } else {
          switch3 = true;
        }
      }else {
        txtKv1Min.text= dataSended[14].toString();  txtKv2Min.text= dataSended[16].toString() ; txtKv3Min.text= dataSended[18].toString();
        txtKv1Max.text= dataSended[15].toString();  txtKv2Max.text= dataSended[17].toString() ; txtKv3Max.text= dataSended[19].toString();

        if(dataSended[28] == 1) {
          switch1 = false;
        } else {
          switch1 = true;
        }
        if(dataSended[29] ==1) {
          switch2 = false;
        } else {
          switch2 = true;
        }
        if(dataSended[30] ==1) {
          switch3 = false;
        } else {
          switch3 = true;
        }
      }
      // txtKv1Min.text = dataSetting[0].toString(); txtKv2Min.text = dataSetting[1].toString(); txtKv3Min.text = dataSetting[2].toString();
      // txtKv1Max.text = dataSetting[3].toString(); txtKv2Max.text = dataSetting[4].toString(); txtKv3Max.text = dataSetting[5].toString();
    });
  }

  // List dataSetting=[];

  final List<String> items = ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00',
    '12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'];
  String? selectedValueStart;
  String? selectedValueEnd;

  TextEditingController txtKv1Min = TextEditingController();
  TextEditingController txtKv2Min = TextEditingController();
  TextEditingController txtKv3Min = TextEditingController();

  TextEditingController txtKv1Max = TextEditingController();
  TextEditingController txtKv2Max = TextEditingController();
  TextEditingController txtKv3Max = TextEditingController();


  int index=1;

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: GestureDetector(
        onTap: (){
          FocusScope.of(context).requestFocus(FocusNode());
        },
        child: Container(
          decoration: const BoxDecoration(
              image: DecorationImage(
                image: AssetImage("assets/images/anhdepV2.jpg"),
                fit: BoxFit.cover,
              ),
          ),
          child:BackdropFilter(
            filter: ImageFilter.blur(sigmaX: 10.0, sigmaY: 10.0),
            child: Column(
              children: [
                //-----------------PANEL------------------
                Stack(
                  children: <Widget>[
                    BackgroundPanel(),
                    IconPanel(),
                  ],
                ),
                
                //------------THIET LAP THOI GIAN BAT DAU VA KET THUC -------------
                Expanded(
                  child: SingleChildScrollView(
                    child: Column(
                      children: [
                        TimeStartAndEndV3(),
                
                        MenuContainer(),
                
                        InputMinMaxContainer(),
                
                        SwitchONOFF(),
                      ],
                    ),
                  ),
                )
              ],
            ),
          ),
        ),
      ),
    );
  }

  bool switch1 = true;
  bool switch2 = false;
  bool switch3 = true;


  Widget SwitchONOFF()=> Padding(
    padding: const EdgeInsets.only(top: 14,bottom: 10),
    child: Container(
      width:MediaQuery.of(context).size.width-20 ,
      // height: 200,
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(25),
          boxShadow: [
            BoxShadow(
              color: Colors.grey.withOpacity(0.5),
              spreadRadius: 5,
              blurRadius: 7,
              offset: const Offset(0, 3),
            ),
          ]
      ),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          const Padding(
            padding: EdgeInsets.only(top: 15,bottom: 15),
            child: Text('Time ON and OFF',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 20,fontWeight: FontWeight.bold),),
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              Row(
                // mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const Text('Area-1: ',style: TextStyle(fontSize: 17,fontWeight: FontWeight.bold,color: Colors.red)),
                  FlutterSwitch(
                    showOnOff: true,
                    width: 95,
                    activeTextColor: Colors.white,
                    inactiveTextColor: Colors.white,
                    activeColor: Colors.deepPurpleAccent,
                    activeText: "Manu",
                    inactiveText: "Auto",
                    value: switch1,
                    onToggle: (val) {
                      setState(() {
                        switch1=val;
                        // if (val == true) dataSetting[6] = 0;
                        // else dataSetting[6] =1;

                        if (index == 1) {
                          dataSended[25] = val == true? 0: 1;
                        } else if (index == 2) {
                          dataSended[22] = val == true? 0: 1;
                        } else {
                          dataSended[28] = val == true? 0: 1;
                        }
                      });
                    },
                  ),

                ],
              ),
              const SizedBox(width: 10,),
              Row(
                // mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const Text('Area-2: ',style: TextStyle(fontSize: 17,fontWeight: FontWeight.bold,color: Colors.blue)),

                  FlutterSwitch(
                    showOnOff: true,
                    width: 95,
                    activeTextColor: Colors.white,
                    inactiveTextColor: Colors.white,
                    activeColor: Colors.deepPurpleAccent,
                    activeText: "Manu",
                    inactiveText: "Auto",
                    value: switch2,
                    onToggle: (val) {
                      setState(() {
                        switch2=val;
                        if (index == 1) {
                          dataSended[26] = val == true? 0: 1;
                        } else if (index == 2) {
                          dataSended[23] = val == true? 0: 1;
                        } else {
                          dataSended[29] = val == true? 0: 1;
                        }
                      });
                    },
                  ),
                ],
              ),
            ],
          ),
          Padding(
            padding: const EdgeInsets.only(bottom: 15,top:15),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                const Text('Area-3: ',style: TextStyle(fontSize: 17,fontWeight: FontWeight.bold,color: Colors.green)),

                FlutterSwitch(
                  showOnOff: true,
                  width: 95,
                  activeTextColor: Colors.white,
                  activeColor: Colors.deepPurpleAccent,
                  inactiveTextColor: Colors.white,
                  activeText: "Manu",
                  inactiveText: "Auto",
                  value: switch3,
                  onToggle: (val) {
                    setState(() {
                      switch3=val;
                      if (index == 1) {
                        dataSended[27] = val == true? 0: 1;
                      } else if (index == 2) {
                        dataSended[24] = val == true? 0: 1;
                      } else {
                        dataSended[30] = val == true? 0: 1;
                      }
                    });
                  },
                ),
              ],
            ),
          ),

          Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: const [
              Text('Auto:',style: TextStyle(color: Colors.black,fontSize: 16,fontWeight: FontWeight.bold),),
              Text(' Always ON/OFF     ',style: TextStyle(color: Colors.black,fontSize: 16),),
            ],
          ),
          Padding(
            padding: const EdgeInsets.only(top:5,bottom: 15),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: const [
                Text('Manu:',style: TextStyle(color: Colors.black,fontSize: 16,fontWeight: FontWeight.bold),),
                Text(' Based on the set time',style: TextStyle(color: Colors.black,fontSize: 16),),
              ],
            ),
          )
          //   ],
          // )
        ],
      ),
    ),
  );

  Widget InputMinMaxContainer()=>Container(
    width: MediaQuery.of(context).size.width-20,
    decoration: BoxDecoration(
      color: Colors.white,
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
    child: Column(
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        const Padding(
          padding: EdgeInsets.only(top: 10),
          child: Text('Enter setting threshold',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 20,fontWeight: FontWeight.bold),),
        ),
        //--------------MIN MAX -------------------
        Padding(
          padding: const EdgeInsets.only(top:20,bottom: 20,left: 14,right: 16),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceAround,
            children: [
              InputMin(),
              InputMax()
            ],
          ),
        )
      ],
    ),
  );

  Widget InputMin()=>Column(
    children: [
      Row(
        children: [
          const Text('Area 1-MIN ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.red)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  // print("input ${double.parse(value.toString())}");
                  if (index == 1) {
                    dataSended[8] = value;
                  } else if( index ==2 ) {
                    dataSended[2] = value;
                  } else {
                    dataSended[14] = value;
                  }
                },
                controller: txtKv1Min,
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],

                decoration: const InputDecoration(
                  // errorText: isNumeric() ? "OK": null,
                  border: InputBorder.none,
                  // hintText: 'Email',
                  // labelText: 'alo'
                ),
              ),
            ),
          ),
        ],
      ),
      const SizedBox(height: 5,),

      Row(
        children: [
          const Text('Area 2-MIN ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.blue)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  print("input $value");

                  if (index == 1) {
                    dataSended[10] = value;
                  } else if( index ==2 ) {
                    dataSended[4] = value;
                  } else {
                    dataSended[16] = value;
                  }
                },
                controller: txtKv2Min,
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],
                decoration: const InputDecoration(
                  border: InputBorder.none,
                  // hintText: 'Email',
                  // labelText: 'alo'
                ),
              ),
            ),
          ),
        ],
      ),

      const SizedBox(height: 5,),

      Row(
        children: [
          const Text('Area 3-MIN ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.green)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  print("input $value");
                  
                  if (index == 1) {
                    dataSended[12] = value;
                  } else if( index ==2 ) {
                    dataSended[6] = value;
                  } else {
                    dataSended[18] = value;
                  }
                },
                controller: txtKv3Min,
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],
                decoration:const  InputDecoration(
                  border: InputBorder.none,
                  // hintText: 'Email',
                  // labelText: 'alo'
                ),
              ),
            ),
          ),
        ],
      )
    ],
  );

  Widget InputMax()=>Column(
    children: [
      Row(
        children: [
          const Text('Area 1-MAX ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.red)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  if (index == 1) {
                    dataSended[9] = value;
                  } else if( index ==2 ) {
                    dataSended[3] = value;
                  } else {
                    dataSended[15] = value;
                  }
                },
                controller: txtKv1Max,
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],
                decoration: const InputDecoration(
                  border: InputBorder.none,
                ),
              ),
            ),
          ),
        ],
      ),

      const SizedBox(height: 5,),

      Row(
        children: [
          const Text('Area 2-MAX ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.blue)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  if (index == 1) {
                    dataSended[11] = value;
                  } else if( index ==2 ) {
                    dataSended[5] = value;
                  } else {
                    dataSended[17] = value;
                  }
                },
                controller: txtKv2Max,
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],
                decoration:const  InputDecoration(
                  border: InputBorder.none,
                ),
              ),
            ),
          ),
        ],
      ),

      const SizedBox(height: 5,),

      Row(
        children: [
          const Text('Area 3-MAX ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold,color: Colors.green)),
          Container(
            width: 55,
            height: 45,
            decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: Colors.grey),
                borderRadius: BorderRadius.circular(10)
            ),
            child: Padding(
              padding: const EdgeInsets.only(left: 2),
              child: TextField(
                onChanged: (value){
                  if (index == 1) {
                    dataSended[13] = value;
                  } else if( index ==2 ) {
                    dataSended[7] = value;
                  } else {
                    dataSended[19] = value;
                  }
                },
                controller: txtKv3Max,
                
                keyboardType: TextInputType.number,
                inputFormatters: [FilteringTextInputFormatter.allow(RegExp(r'^(\d+)?\.?\d{0,2}'))],
                decoration:const  InputDecoration(
                  border: InputBorder.none,
                ),
              ),
            ),
          ),
        ],
      )
    ],
  );

  Widget MenuContainer()=>Padding(
    padding: const EdgeInsets.only(top:12,left: 15,right: 15,bottom: 12),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.spaceAround,
      children: [
        MenuSetting(),
        DataPresent()
      ],
    ),
  );

  Widget DataPresent()=>Container(
    width: MediaQuery.of(context).size.width *2/5-10,
    height: 150,
    decoration: BoxDecoration(
      color: Colors.white,
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
      padding: const EdgeInsets.only(left: 15,right: 15,bottom: 20),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          const Padding(
            padding: EdgeInsets.only(top:15,bottom: 8),
            child: Text("Present",style: TextStyle(fontSize: 20 ,fontWeight: FontWeight.bold),),
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceAround,
            children: [
              const Text("KV-1:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.red)),
              index ==1? Text("${double.parse(dataHome[0].temperature1.toString())/10}",style: const TextStyle(fontSize: 16)):
                  index == 2? Text("${double.parse(dataHome[0].humidity1.toString())/10}",style: const TextStyle(fontSize: 16)):
                  Text("${dataHome[0].light1}",style: const TextStyle(fontSize: 16)),
            ],
          ),
          Padding(
            padding: const EdgeInsets.only(top: 2,bottom: 2),
            child: Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: [
                const Text("KV-2:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.blue)),
                index ==1? Text("${double.parse(dataHome[0].temperature2.toString())/10}",style: const TextStyle(fontSize: 16)):
                index == 2? Text("${double.parse(dataHome[0].humidity2.toString())/10}",style: const TextStyle(fontSize: 16)):
                Text("${dataHome[0].light2}",style: const TextStyle(fontSize: 16)),
              ],
            ),
          ),
          Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
            children: [
              const Text("KV-3:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.green)),
              index ==1? Text("${double.parse(dataHome[0].temperature3.toString())/10}",style: const TextStyle(fontSize: 16)):
              index == 2? Text("${double.parse(dataHome[0].humidity3.toString())/10}",style: const TextStyle(fontSize: 16)):
              Text("${dataHome[0].light3}",style: const TextStyle(fontSize: 16)),
            ],
          )
        ],
      ),
    ),
  );

  Widget MenuAnimation()=> AnimatedAlign(
    duration:const  Duration(milliseconds: 500),
    curve: Curves.fastOutSlowIn,
    alignment:
    index == 1? AlignmentDirectional.topCenter:
                  index == 2?
                  Alignment.center
                      : AlignmentDirectional.bottomCenter,
    child:  Container(
      decoration: BoxDecoration(
        color: Colors.deepPurpleAccent,
        borderRadius: BorderRadius.circular(50),
        ),
        child: Padding(
          padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
          child: Row(
            mainAxisAlignment:  MainAxisAlignment.spaceAround,
            crossAxisAlignment: CrossAxisAlignment.center,
            children: [
              index == 1?const  Text('Temp ',style: TextStyle(color: Colors.white,fontSize: 16,fontWeight: FontWeight.bold),):
                  index == 2?const  Text('Humidity ',style: TextStyle(color: Colors.white,fontSize: 16,fontWeight: FontWeight.bold),):
                    const Text('Light ',style: TextStyle(color: Colors.white,fontSize: 16,fontWeight: FontWeight.bold),),
              const Icon(Icons.arrow_right_rounded, color: Colors.white),
            ],
          ),
        ),
    ),
  );

  Widget MenuBackGround()=>Column(
      mainAxisAlignment: MainAxisAlignment.center,
      crossAxisAlignment: CrossAxisAlignment.center,
    children: [
      GestureDetector(
        onTap: (){
          setState(() {
            index = 1;
            ChangeControllerTextInput();
            // print('index = $index');
          });
        },
        child: Container(
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(50),
          ),
          child: Padding(
            padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center, crossAxisAlignment: CrossAxisAlignment.center,
              children:const  [
                Text('Temp ',style: TextStyle(color:  Colors.deepPurpleAccent,fontSize: 16,fontWeight: FontWeight.bold),),
              ],
            ),
          ),
        ),
      ),

      GestureDetector(
        onTap: (){
          setState(() {
            index = 2;
            ChangeControllerTextInput();
          });
        },
        child: Container(
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(50),
          ),
          child: Padding(
            padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center,    crossAxisAlignment: CrossAxisAlignment.center,
              children: const [
                Text('Humidity ',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 16,fontWeight: FontWeight.bold),),
              ],
            ),
          ),
        ),
      ),

      GestureDetector(
        onTap: (){
          setState(() {
            index = 3;
            ChangeControllerTextInput();
          });
        },
        child: Container(
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(50),
          ),
          child: Padding(
            padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.center, crossAxisAlignment: CrossAxisAlignment.center,
              children: const [
                Text('Light ',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 16,fontWeight: FontWeight.bold),), 
              ],
            ),
          ),
        ),
      ),
    ],
  );

  Widget MenuSetting()=>Container(
    width: MediaQuery.of(context).size.width*2/5,
    height: 150,
    decoration: BoxDecoration(
      color: Colors.white,  //purple[100]
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
      padding: const EdgeInsets.all(8.0),
      child: Stack(
        alignment: Alignment.center,
        children: [
          MenuBackGround(),
          MenuAnimation(),
        ],
      )
    ),
  );


  Widget TimeStartAndEndV3()=>Padding(
    padding: const EdgeInsets.only(top: 15),
    child: Container(
      width: MediaQuery.of(context).size.width-20,
      decoration: BoxDecoration(
        color: Colors.deepPurpleAccent,
        borderRadius: BorderRadius.circular(50),
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.5),
            spreadRadius: 5,
            blurRadius: 7,
            offset:const Offset(0, 3),
          ),
        ],
      ),
      child: Padding(
        padding: const EdgeInsets.all(10.0),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            const Text('Start time:',style: TextStyle(color: Colors.white,fontSize: 17,fontWeight: FontWeight.bold),),
            DropdownButtonHideUnderline(
              child: DropdownButton2(
                isExpanded: true,
                items: items.map((item) =>
                    DropdownMenuItem<String>(
                      value: item,
                      child: Text(item,style: const TextStyle(fontSize: 14,fontWeight: FontWeight.bold,color: Colors.deepPurpleAccent,),
                        overflow: TextOverflow.ellipsis,), )).toList(),
                value: selectedValueStart,
                onChanged: (value) {
                  setState(() {
                    selectedValueStart = value as String;
                    dataSended[21] = value;
                  });
                },
                buttonWidth: 75,   buttonPadding: const EdgeInsets.only(left: 8, right: 0),
                buttonDecoration: BoxDecoration( borderRadius: BorderRadius.circular(75),  color: Colors.white,  ),
                itemHeight: 40,   itemPadding: const EdgeInsets.only(left: 14, right: 14),
                dropdownMaxHeight: 200,
                dropdownWidth: 75,
                dropdownPadding: null,
                dropdownDecoration: BoxDecoration( borderRadius: BorderRadius.circular(14),  color: Colors.white,  ),
                scrollbarRadius: const Radius.circular(40), scrollbarThickness: 6, scrollbarAlwaysShow: false,
              ),
            ),
            const Icon(Icons.arrow_circle_right_rounded ,color: Colors.white,size: 30),

            DropdownButtonHideUnderline(
              child: DropdownButton2(
                isExpanded: true,
                items: items.map((item) =>
                    DropdownMenuItem<String>(
                      value: item,
                      child: Text(item,style: const TextStyle(fontSize: 14,fontWeight: FontWeight.bold,color: Colors.deepPurpleAccent,),
                        overflow: TextOverflow.ellipsis,),)).toList(),
                value: selectedValueEnd,
                onChanged: (value) {
                  setState(() {
                    selectedValueEnd = value as String;
                    dataSended[20] = value;
                  });
                },
                buttonWidth: 75,
                buttonPadding: const EdgeInsets.only(left: 8, right: 0),
                buttonDecoration: BoxDecoration(borderRadius: BorderRadius.circular(75),color: Colors.white,),
                itemHeight: 40, itemPadding: const EdgeInsets.only(left: 14, right: 14),
                dropdownMaxHeight: 200,
                dropdownWidth: 100,
                dropdownPadding: null,
                dropdownDecoration: BoxDecoration(borderRadius: BorderRadius.circular(14), color: Colors.white,),
                scrollbarRadius: const Radius.circular(40),scrollbarThickness: 6, scrollbarAlwaysShow: false,
              ),
            ),
          ],
        ),
      ),
    ),
  );



  Widget IconPanel()=>Align(
    alignment: Alignment.topRight,
    child: Padding(
      padding: const EdgeInsets.only(top: 10,right: 30),
      child: GestureDetector(
        onTap: (){
          AwesomeDialog(
            context: context,
            dialogType: DialogType.question,
            animType: AnimType.scale,
            // showCloseIcon: true,
            title: "Do You want to send data?",
            // desc: "Do You want to logout ?",
            btnCancelOnPress: (){},
            btnOkOnPress: (){
              showLoaderDialog(context);
              sendData();
            }
          ).show();          
        },
        child: Container(
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(50),
            boxShadow: [
              BoxShadow(
                color: Colors.white.withOpacity(0.3),
                spreadRadius: 5,
                blurRadius: 7,
                offset:const  Offset(0, 3),
              ),
            ],
          ),
          child:const Padding(
            padding: EdgeInsets.only(top: 10, bottom: 15, left: 17, right: 10),
            child: RotationTransition(
              turns:  AlwaysStoppedAnimation(335 / 360),
              child: Icon(Icons.send_rounded,size: 35,color: Colors.deepPurpleAccent,)
            ),
          ),
        ),
      ),
    ),
  );

  Widget BackgroundPanel()=>Container(
    width: MediaQuery.of(context).size.width,
    height: 80,
    decoration: BoxDecoration(
      color: Colors.deepPurpleAccent,

      borderRadius: const BorderRadius.only(
          bottomRight: Radius.circular(50),
          bottomLeft: Radius.circular(50)
      ),
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
      padding: const EdgeInsets.only(left: 30),
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.start,
        children: const [
            Text('Setting', style: TextStyle( fontSize: 22,  fontWeight: FontWeight.bold,color: Colors.white,),),
            Text('   Sensor threshold',style: TextStyle( fontSize: 22,  fontWeight: FontWeight.bold,color: Colors.white,),),
        ],
      ),
    ),
  );

  showLoaderDialog(BuildContext context){
    AlertDialog alert=AlertDialog(
      content: SizedBox(
        height: 150,
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            const SpinKitDoubleBounce(
              color: Colors.deepPurpleAccent,
              size: 60,
            ),

            const SizedBox(height: 20,),

            Container(margin: const EdgeInsets.only(left: 7),child:const Text(" Loading..." , style: TextStyle(fontSize: 18, color: Colors.black,),)),
          ],),
      ),
    );
    showDialog(barrierDismissible: false,
      context:context,
      builder:(BuildContext context){
        return alert;
      },
    );
  }
}
