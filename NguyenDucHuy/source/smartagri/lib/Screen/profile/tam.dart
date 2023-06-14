// // // // // // // // // // // // // // // // // // GestureDetector(
// // // // // // // // // // // // // // // // // //   onTap: (){
// // // // // // // // // // // // // // // // // //     Navigator.of(context).pop();
// // // // // // // // // // // // // // // // // //   },
// // // // // // // // // // // // // // // // // //   child: const Icon(Icons.keyboard_backspace_rounded, size: 40, color: Colors.blue,)
// // // // // // // // // // // // // // // // // // ),

// // // // // // // // // // // // // // // // // Row(
// // // // // // // // // // // // // // // // //   mainAxisAlignment: MainAxisAlignment.spaceBetween,
// // // // // // // // // // // // // // // // //   children: [
// // // // // // // // // // // // // // // // //     Column(
// // // // // // // // // // // // // // // // //       children: const [
// // // // // // // // // // // // // // // // //       Text(''),
// // // // // // // // // // // // // // // // //       Padding(
// // // // // // // // // // // // // // // // //         padding: EdgeInsets.only(top: 25,bottom: 20),
// // // // // // // // // // // // // // // // //         child: Text('Area 1',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold),),),
// // // // // // // // // // // // // // // // //       Text('Area 2',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold)),
// // // // // // // // // // // // // // // // //       Padding(
// // // // // // // // // // // // // // // // //         padding: EdgeInsets.only(bottom: 15,top:20),
// // // // // // // // // // // // // // // // //         child: Text('Area 3',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold)),),],),

// // // // // // // // // // // // // // // // //     RowPanel(1, 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Humidity(dataHome[0].temperature1.toString())), 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Humidity(dataHome[0].temperature2.toString())), 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Humidity(dataHome[0].temperature3.toString()))),
// // // // // // // // // // // // // // // // //     RowPanel(2, 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Div10(dataHome[0].humidity1!)), 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Div10(dataHome[0].humidity2!)), 
// // // // // // // // // // // // // // // // //       num.parse(Changes().Div10(dataHome[0].humidity3!))),
// // // // // // // // // // // // // // // // //     RowPanel(3, 
// // // // // // // // // // // // // // // // //       num.parse(dataHome[0].light1!.toString()), 
// // // // // // // // // // // // // // // // //       num.parse(dataHome[0].light2!.toString()), 
// // // // // // // // // // // // // // // // //       num.parse(dataHome[0].light3!.toString())),
// // // // // // // // // // // // // // // // //   ],
// // // // // // // // // // // // // // // // // ),

// // // // // // // // // // // // // // // // Stack(
// // // // // // // // // // // // // // // //   children: <Widget>[
// // // // // // // // // // // // // // // //     Pannel(),
// // // // // // // // // // // // // // // //     MenuContainer(),
// // // // // // // // // // // // // // // //   ],
// // // // // // // // // // // // // // // // ),

// // // // // // // // // // // // // // // Widget MenuBackground()=> Row(
// // // // // // // // // // // // // // //   mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // // // // // // // // // // // // //   crossAxisAlignment: CrossAxisAlignment.end,
// // // // // // // // // // // // // // //   children: [
// // // // // // // // // // // // // // //     //----------Menu Temp----------
// // // // // // // // // // // // // // //     GestureDetector(
// // // // // // // // // // // // // // //       onTap: (){...},
// // // // // // // // // // // // // // //       child: Text('Temp')
// // // // // // // // // // // // // // //     ),
    
// // // // // // // // // // // // // // //     //----------Menu Humidity----------
// // // // // // // // // // // // // // //     GestureDetector(
// // // // // // // // // // // // // // //       onTap: (){...},
// // // // // // // // // // // // // // //       child: Text('Humidity')
// // // // // // // // // // // // // // //     ),
    
// // // // // // // // // // // // // // //     //----------Menu Light----------
// // // // // // // // // // // // // // //     GestureDetector(
// // // // // // // // // // // // // // //       onTap: (){...},
// // // // // // // // // // // // // // //       child: Text('Light')
// // // // // // // // // // // // // // //     ),
// // // // // // // // // // // // // // //   ],
// // // // // // // // // // // // // // // );


// // // // // // // // // // // // // // // // Widget Pannel()=>Container(
// // // // // // // // // // // // // // // //   width: MediaQuery.of(context).size.width,
// // // // // // // // // // // // // // // //   decoration: BoxDecoration(
// // // // // // // // // // // // // // // //       color: const Color(0xff6849ef) ,
// // // // // // // // // // // // // // // //       borderRadius: const BorderRadius.only(
// // // // // // // // // // // // // // // //         bottomLeft: Radius.circular(50.0),
// // // // // // // // // // // // // // // //         bottomRight: Radius.circular(50.0)
// // // // // // // // // // // // // // // //       ),
// // // // // // // // // // // // // // // //       gradient:const  LinearGradient(),
// // // // // // // // // // // // // // // //       boxShadow: [],
// // // // // // // // // // // // // // // //   child:const  Padding(
// // // // // // // // // // // // // // // //     padding: EdgeInsets.only(top: 20,bottom: 35),
// // // // // // // // // // // // // // // //     child: Center(
// // // // // // // // // // // // // // // //       child: Text('Data for the last 12 hours',
// // // // // // // // // // // // // // // //         style: TextStyle(
// // // // // // // // // // // // // // // //           fontSize: 21,
// // // // // // // // // // // // // // // //           fontWeight: FontWeight.bold,
// // // // // // // // // // // // // // // //           color: Colors.white,
// // // // // // // // // // // // // // // //         ),),
// // // // // // // // // // // // // // // //     ),
// // // // // // // // // // // // // // // //   ),
// // // // // // // // // // // // // // // // );

// // // // // // // // // // // // // // // // Widget Menu()=>Padding(
// // // // // // // // // // // // // // // //   padding: const EdgeInsets.only(top:60),
// // // // // // // // // // // // // // // //   child: Center(
// // // // // // // // // // // // // // // //     child: Container(
// // // // // // // // // // // // // // // //       width: MediaQuery.of(context).size.width * 3/4 ,
// // // // // // // // // // // // // // // //       height: 50,
// // // // // // // // // // // // // // // //       decoration: BoxDecoration(...),
// // // // // // // // // // // // // // // //       child: Row(
// // // // // // // // // // // // // // // //         mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // // // // // // // // // // // // // //         children: [
// // // // // // // // // // // // // // // //           //----------Menu Temp----------
// // // // // // // // // // // // // // // //           GestureDetector(
// // // // // // // // // // // // // // // //             onTap: (){...},
// // // // // // // // // // // // // // // //             child: Container(
// // // // // // // // // // // // // // // //                 decoration: BoxDecoration(
// // // // // // // // // // // // // // // //                   color: indexMenu == 1 ? Colors.deepPurpleAccent : Colors.white,
// // // // // // // // // // // // // // // //                   borderRadius: BorderRadius.circular(50)
// // // // // // // // // // // // // // // //                 ),
// // // // // // // // // // // // // // // //                 child: Padding(
// // // // // // // // // // // // // // // //                   padding: const EdgeInsets.all(8.0),
// // // // // // // // // // // // // // // //                   child: indexMenu ==1 ?  const Text(' Temp ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
// // // // // // // // // // // // // // // //                       :const Text('Temp',style: TextStyle(fontSize: 13,color: Colors.black,fontWeight: FontWeight.normal),),
// // // // // // // // // // // // // // // //                 )
// // // // // // // // // // // // // // // //             ),
// // // // // // // // // // // // // // // //           ),

// // // // // // // // // // // // // // // //           //----------Menu Humidity----------
// // // // // // // // // // // // // // // //           GestureDetector(
// // // // // // // // // // // // // // // //             onTap: (){...},
// // // // // // // // // // // // // // // //             child: Container(
// // // // // // // // // // // // // // // //                 decoration: BoxDecoration(
// // // // // // // // // // // // // // // //                     color: indexMenu == 2 ? Colors.deepPurpleAccent : Colors.white,
// // // // // // // // // // // // // // // //                     borderRadius: BorderRadius.circular(50)
// // // // // // // // // // // // // // // //                 ),
// // // // // // // // // // // // // // // //                 child: Padding(
// // // // // // // // // // // // // // // //                   padding: const EdgeInsets.all(8.0),
// // // // // // // // // // // // // // // //                   child: indexMenu ==2 ?  const Text(' Humidity ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
// // // // // // // // // // // // // // // //                       :const Text('Humidity',style: TextStyle(fontSize: 14,color: Colors.black,fontWeight: FontWeight.normal),),
// // // // // // // // // // // // // // // //                 )
// // // // // // // // // // // // // // // //             ),
// // // // // // // // // // // // // // // //           ),

// // // // // // // // // // // // // // // //           //----------Menu Light----------
// // // // // // // // // // // // // // // //           GestureDetector(
// // // // // // // // // // // // // // // //             onTap: (){...}
// // // // // // // // // // // // // // // //             child: Container(
// // // // // // // // // // // // // // // //                 decoration: BoxDecoration(
// // // // // // // // // // // // // // // //                     color: indexMenu == 3 ? Colors.deepPurpleAccent : Colors.white,
// // // // // // // // // // // // // // // //                     borderRadius: BorderRadius.circular(50)
// // // // // // // // // // // // // // // //                 ),
// // // // // // // // // // // // // // // //                 child: Padding(
// // // // // // // // // // // // // // // //                   padding: const EdgeInsets.all(8.0),
// // // // // // // // // // // // // // // //                   child: indexMenu ==3 ?  const Text(' Light ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
// // // // // // // // // // // // // // // //                       :const Text('Light',style: TextStyle(fontSize: 14,color: Colors.black,fontWeight: FontWeight.normal),),
// // // // // // // // // // // // // // // //                 )
// // // // // // // // // // // // // // // //             ),
// // // // // // // // // // // // // // // //           ),
// // // // // // // // // // // // // // // //         ],
// // // // // // // // // // // // // // // //       ),
// // // // // // // // // // // // // // // //     ),
// // // // // // // // // // // // // // // //   ),
// // // // // // // // // // // // // // // // );



// // // // // // // // // // // // // // //-------------3 THÔNG BẢNG PANEL : GIÁ TRỊ Present, TRẠNG THÁI Switch, MIN MÃ 3 KHU VỰC ---------------
// // // // // // // // // // // // // // import 'package:flutter/material.dart';

// // // // // // // // // // // // // // Widget SliderValue()=>SingleChildScrollView(
// // // // // // // // // // // // // //   scrollDirection: Axis.horizontal,
// // // // // // // // // // // // // //   child: Padding(
// // // // // // // // // // // // // //     padding: const EdgeInsets.only(left: 10,top: 15,right: 10,bottom: 15),
// // // // // // // // // // // // // //     child: Row(
// // // // // // // // // // // // // //       mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // // // // // // // // // // // //       children: [
// // // // // // // // // // // // // //         // ---------------Giá trị Hiện tại -----------------------------
// // // // // // // // // // // // // //         Container(
// // // // // // // // // // // // // //           decoration: BoxDecoration(...),
// // // // // // // // // // // // // //           child: Column(
// // // // // // // // // // // // // //             mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // // //             children: [
// // // // // // // // // // // // // //               const Padding(
// // // // // // // // // // // // // //                 padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // // //                 child: Text("Present",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // // //               ),
// // // // // // // // // // // // // //               Row(...),
// // // // // // // // // // // // // //             ],
// // // // // // // // // // // // // //           ),
// // // // // // // // // // // // // //         ),
// // // // // // // // // // // // // //         // ---------------Trạng thái công tắc-----------------------------
// // // // // // // // // // // // // //         Padding(
// // // // // // // // // // // // // //           padding: const EdgeInsets.only(left: 15,right: 15),
// // // // // // // // // // // // // //           child: Container(
// // // // // // // // // // // // // //             width: MediaQuery.of(context).size.width*2/5,
// // // // // // // // // // // // // //             decoration: BoxDecoration(...),
// // // // // // // // // // // // // //             child: Padding(
// // // // // // // // // // // // // //               padding: const EdgeInsets.only(left: 25,right: 25,bottom: 20),
// // // // // // // // // // // // // //               child: Column(
// // // // // // // // // // // // // //                 mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // // //                 children: [
// // // // // // // // // // // // // //                   const Padding(
// // // // // // // // // // // // // //                     padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // // //                     child: Text("Switch",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // // //                   ),
// // // // // // // // // // // // // //                   Row(...)
// // // // // // // // // // // // // //                 ],
// // // // // // // // // // // // // //               ),
// // // // // // // // // // // // // //             ),
// // // // // // // // // // // // // //           ),
// // // // // // // // // // // // // //         ),
// // // // // // // // // // // // // //         // --------------- Ngưỡng thiết lập MIN / MAX-----------------------------
// // // // // // // // // // // // // //         Container(
// // // // // // // // // // // // // //           decoration: BoxDecoration(...),
// // // // // // // // // // // // // //           child: Padding(
// // // // // // // // // // // // // //             padding: const EdgeInsets.only(left: 20,right: 20,bottom: 20),
// // // // // // // // // // // // // //             child: Column(
// // // // // // // // // // // // // //               mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // // //               children: [
// // // // // // // // // // // // // //                 const Padding(
// // // // // // // // // // // // // //                   padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // // //                   child: Text("Setting",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // // //                 ),
// // // // // // // // // // // // // //                 Row(...),
// // // // // // // // // // // // // //               ],
// // // // // // // // // // // // // //             ),
// // // // // // // // // // // // // //           ),
// // // // // // // // // // // // // //         ),
// // // // // // // // // // // // // //       ],
// // // // // // // // // // // // // //     ),
// // // // // // // // // // // // // //   ),
// // // // // // // // // // // // // // );

// // // // // // // // // // // // // PresentWidget();
// // // // // // // // // // // // //         // ---------------Trạng thái công tắc-----------------------------
// // // // // // // // // // // // //         SwitchWidget();
// // // // // // // // // // // // //         // --------------- Ngưỡng thiết lập MIN / MAX-----------------------------
// // // // // // // // // // // // //         MinMaxWidget();
        
// // // // // // // // // // // // // Widget PresentWidget() => Container(
// // // // // // // // // // // // //   decoration: BoxDecoration(...),
// // // // // // // // // // // // //   child: Column(
// // // // // // // // // // // // //     mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // //     children: [
// // // // // // // // // // // // //       const Padding(
// // // // // // // // // // // // //         padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // //         child: Text("Present",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // //       ),
// // // // // // // // // // // // //       Row(...),
// // // // // // // // // // // // //     ],
// // // // // // // // // // // // //   ),
// // // // // // // // // // // // // ),



// // // // // // // // // // // // // Padding(
// // // // // // // // // // // // //   padding: const EdgeInsets.only(left: 15,right: 15),
// // // // // // // // // // // // //   child: Container(
// // // // // // // // // // // // //     width: MediaQuery.of(context).size.width*2/5,
// // // // // // // // // // // // //     decoration: BoxDecoration(...),
// // // // // // // // // // // // //     child: Padding(
// // // // // // // // // // // // //       padding: const EdgeInsets.only(left: 25,right: 25,bottom: 20),
// // // // // // // // // // // // //       child: Column(
// // // // // // // // // // // // //         mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // //         children: [
// // // // // // // // // // // // //           const Padding(
// // // // // // // // // // // // //             padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // //             child: Text("Switch",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // //           ),
// // // // // // // // // // // // //           Row(...)
// // // // // // // // // // // // //         ],
// // // // // // // // // // // // //       ),
// // // // // // // // // // // // //     ),
// // // // // // // // // // // // //   ),
// // // // // // // // // // // // // ),



// // // // // // // // // // // // // Container(
// // // // // // // // // // // // //   decoration: BoxDecoration(...),
// // // // // // // // // // // // //   child: Padding(
// // // // // // // // // // // // //     padding: const EdgeInsets.only(left: 20,right: 20,bottom: 20),
// // // // // // // // // // // // //     child: Column(
// // // // // // // // // // // // //       mainAxisAlignment: MainAxisAlignment.center,
// // // // // // // // // // // // //       children: [
// // // // // // // // // // // // //         const Padding(
// // // // // // // // // // // // //           padding: EdgeInsets.only(top:15,bottom: 8),
// // // // // // // // // // // // //           child: Text("Setting",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
// // // // // // // // // // // // //         ),
// // // // // // // // // // // // //         Row(...),
// // // // // // // // // // // // //       ],
// // // // // // // // // // // // //     ),
// // // // // // // // // // // // //   ),
// // // // // // // // // // // // // ),

// // // // // // // // // // // // LineChart(
// // // // // // // // // // // //   LineChartData(
// // // // // // // // // // // //     lineTouchData: ChartTitle.lineTouchData1(),
// // // // // // // // // // // //     gridData: ChartTitle.gridData(),
// // // // // // // // // // // //     titlesData: FlTitlesData(...) 
// // // // // // // // // // // //     borderData: ChartTitle.borderData(),
// // // // // // // // // // // //     lineBarsData: [
// // // // // // // // // // // //       LineChartBarData(....),
// // // // // // // // // // // //       LineChartBarData(...),
// // // // // // // // // // // //       LineChartBarData(...),
// // // // // // // // // // // //     ],
// // // // // // // // // // // //     minX: 0,
// // // // // // // // // // // //     maxX: 13,
// // // // // // // // // // // //     maxY: double.parse(maxY .toString()),
// // // // // // // // // // // //     minY: double.parse(minY[1].toString()),
// // // // // // // // // // // //   )
// // // // // // // // // // // // )

// // // // // // // // // // // // GestureDetector(
// // // // // // // // // // // //   onTap: () async {
// // // // // // // // // // // //     DateTime? newDate1 = await showGeneralDialog<DateTime>(
// // // // // // // // // // // //       context: context,
// // // // // // // // // // // //       pageBuilder: (context, anim1, anim2) {
// // // // // // // // // // // //         return DatePickerDialog(
// // // // // // // // // // // //         initialDate: dateFinish,
// // // // // // // // // // // //         firstDate:	DateTime(2020),
// // // // // // // // // // // //         lastDate: DateTime(2030),
// // // // // // // // // // // //         );
// // // // // // // // // // // //       },
// // // // // // // // // // // //       transitionBuilder: (context, anim1, anim2, child) {
// // // // // // // // // // // //         return SlideTransition(
// // // // // // // // // // // //         position: anim1.drive(
// // // // // // // // // // // //           Tween(
// // // // // // // // // // // //             begin: const Offset(1, 0),
// // // // // // // // // // // //             end: const Offset(0, 0),
// // // // // // // // // // // //           ),
// // // // // // // // // // // //         ),
// // // // // // // // // // // //       },
// // // // // // // // // // // //     );
// // // // // // // // // // // //   },
// // // // // // // // // // // //   child: Container(
// // // // // // // // // // // //     height: 38,
// // // // // // // // // // // //     // width: 100,
// // // // // // // // // // // //     decoration: BoxDecoration(
// // // // // // // // // // // //         color: Colors.white,
// // // // // // // // // // // //         borderRadius: BorderRadius.circular(12)
// // // // // // // // // // // //     ),
// // // // // // // // // // // //     child: Center(
// // // // // // // // // // // //       child: Text('${dateFinish.day}/${dateFinish.month}/${dateFinish.year}   ',
// // // // // // // // // // // //       style: const TextStyle(
// // // // // // // // // // // //         fontSize: 15,
// // // // // // // // // // // //         fontWeight: FontWeight.bold,
// // // // // // // // // // // //         color: Colors.deepPurple,
// // // // // // // // // // // //       ),),
// // // // // // // // // // // //     ),
// // // // // // // // // // // //   ),
// // // // // // // // // // // // ),


// // // // @override
// // // // Widget build(BuildContext context) {
// // // //   return SafeArea(
// // // //     child: Column(
// // // //     children: [
// // // //       //-----------------HEADER------------------
// // // //       Stack(
// // // //         children: <Widget>[
// // // //           BackgroundPanel(),
// // // //           IconPanel(),
// // // //         ],
// // // //       ),      
// // // //       //------------THIET LAP DU LIEU -------------
// // // //       Expanded(
// // // //         child: SingleChildScrollView(
// // // //           child: Column(
// // // //             children: [
// // // //               TimeStartAndEndV3(),      
// // // //               MenuContainer(),      
// // // //               InputMinMaxContainer(),      
// // // //               SwitchONOFF(),
// // // //             ],
// // // //           ),
// // // //         ),
// // // //       )
// // // //     ],
// // // //   ),
// // // // }


// // // // AnimatedAlign(
// // // //   duration:const  Duration(milliseconds: 500),
// // // //   curve: Curves.fastOutSlowIn,
// // // //   alignment:
// // // //   index == 1? AlignmentDirectional.topCenter
// // // //   : index == 2?  Alignment.center
// // // //   : AlignmentDirectional.bottomCenter,
// // // //   child:  Container(
// // // //     decoration: BoxDecoration(...),
// // // //     child:
// // // //       child: Row(
// // // //         mainAxisAlignment:  MainAxisAlignment.spaceAround,
// // // //         crossAxisAlignment: CrossAxisAlignment.center,
// // // //         children: [
// // // //           Text(itemChoose),
// // // //           const Icon(Icons.arrow_right_rounded, color: Colors.white),
// // // //         ],
// // // //     ),
// // // //   ),
// // // // );


// // // ClipRRect(
// // //   borderRadius: BorderRadius.circular(33),
// // //   child: plant == ""?
// // //   Image.asset( 'assets/images/plant_default.jpg', 
// // //         width: MediaQuery.of(context).size.width/2-60,
// // //         height: MediaQuery.of(context).size.width/2-60,
// // //         fit: BoxFit.contain
// // //       )
// // //     :
// // //   FadeInImage(
// // //     image: NetworkImage(plant),
// // //     placeholder: const AssetImage('assets/images/plant_default.jpg'),
// // //     imageErrorBuilder: (context, error, stackTrace) {
// // //       return Image.asset( 'assets/images/plant_default.jpg', 
// // //         width: MediaQuery.of(context).size.width/2-60,
// // //         height: MediaQuery.of(context).size.width/2-60,
// // //         fit: BoxFit.contain
// // //       );
// // //     },
// // //     width: MediaQuery.of(context).size.width/2-60,
// // //     height: MediaQuery.of(context).size.width/2-60,
// // //     fit: BoxFit.contain,
// // //   )
// // // ),


// // // // Widget MenuBackGround()=>Column(
// // // //   mainAxisAlignment: MainAxisAlignment.center,
// // // //   crossAxisAlignment: CrossAxisAlignment.center,
// // // //   children: [
// // // //     GestureDetector(
// // // //       onTap: (){
// // // //         setState(() {
// // // //           index = 1;
// // // //           ChangeControllerTextInput();
// // // //         });
// // // //       },
// // // //       child: Text('Temp ')
// // // //     ),

// // // //     GestureDetector(
// // // //       onTap: (){
// // // //         setState(() {
// // // //           index = 2;
// // // //           ChangeControllerTextInput();
// // // //         });
// // // //       },
// // // //       child: Text('Humidity ')
// // // //     ),

// // // //     GestureDetector(
// // // //       onTap: (){
// // // //         setState(() {
// // // //           index = 3;
// // // //           ChangeControllerTextInput();
// // // //         });
// // // //       },
// // // //       child: Text('Light ')
// // // //     ),
// // // // ],



// // // // Widget InputMinMaxContainer()=>Container(
// // // //   decoration: BoxDecoration(...),
// // // //   child: Column(
// // // //     mainAxisAlignment: MainAxisAlignment.center,
// // // //     children: [
// // // //       const Padding(
// // // //         padding: EdgeInsets.only(top: 10),
// // // //         child: Text('Enter setting threshold',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 20),),
// // // //       ),
// // // //       //--------------MIN MAX -------------------
// // // //       Row(
// // // //         mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // //         children: [
// // // //           InputMin(),
// // // //           InputMax()
// // // //         ],
// // // //       ),
// // // //     ],
// // // //   ),
// // // // );


// // // // // // // import 'package:flutter/material.dart';

// // // // Widget InputMin()=>Column(
// // // //   children: [
// // // //     Row(
// // // //       children: [
// // // //         const Text('Area 1-MIN ',style: 
// // // //         TextStyle(fontSize: 17,fontWeight: FontWeight.bold,color: Colors.red)),
// // // //         Container(
// // // //           width: 55,
// // // //           height: 45,
// // // //           decoration: BoxDecoration(
// // // //               color: Colors.white,
// // // //               border: Border.all(color: Colors.grey),
// // // //               borderRadius: BorderRadius.circular(10)
// // // //           ),
// // // //           child: Padding(
// // // //             padding: const EdgeInsets.only(left: 2),
// // // //             child: TextField(
// // // //               onChanged: (value){ setState({txtKv1Min})},
// // // //               controller: txtKv1Min,
// // // //               keyboardType: TextInputType.number,
// // // //               decoration: const InputDecoration(
// // // //                 border: InputBorder.none,
// // // //               ),
// // // //             ),
// // // //           ),
// // // //         ),
// // // //       ],
// // // //     ),
// // // //     ...
// // // // );


// // // // Widget SwitchONOFF()=> Padding(
// // // //   child: Container(
// // // //     decoration: BoxDecoration(...),
// // // //     child: Column(
// // // //       mainAxisAlignment: MainAxisAlignment.center,
// // // //       children: [
// // // //         const Padding(
// // // //           padding: EdgeInsets.only(top: 15,bottom: 15),
// // // //           child: Text('Time ON and OFF',style: TextStyle(color: Colors.deepPurpleAccent,fontSize: 20,fontWeight: FontWeight.bold),),
// // // //         ),
// // // //         Row(
// // // //           mainAxisAlignment: MainAxisAlignment.spaceEvenly,
// // // //           children: [
// // // //             Row(
// // // //               children: [
// // // //                 const Text('Area-1: ',style: TextStyle(fontSize: 17,fontWeight: FontWeight.bold,color: Colors.red)),
// // // //                 FlutterSwitch(
// // // //                   showOnOff: true,
// // // //                   activeTextColor: Colors.white, inactiveTextColor: Colors.white,
// // // //                   activeColor: Colors.deepPurpleAccent,
// // // //                   activeText: "Manu",   inactiveText: "Auto",
// // // //                   value: switch1,
// // // //                   onToggle: (val) {
// // // //                     setState(() {switch1=val;});
// // // //                   },
// // // //               ),
// // // //               ...
// // // //         ],
// // // //       ), ...
// // // //   ]
// // // // )


// // // // Future<void> sendData() async {
// // // //   try{
// // // //     print("--------------------------Data Send ------------------------------");
// // // //     await DataSheetApi.insertSend([dataSend]).whenComplete(() =>
// // // //     {
// // // //       setState(() {
// // // //         Navigator.pop(context);
// // // //         showDialog<String>(
// // // //           context: context,
// // // //           builder: (BuildContext context) => AlertDialog(
// // // //             title: const Text('Done'),
// // // //             content: const Text('Successful setup.'),
// // // //             actions: <Widget>[
// // // //               TextButton(
// // // //                 onPressed: () => Navigator.pop(context, 'OK'),
// // // //                 child: const Text('OK'),
// // // //               ),
// // // //             ],
// // // //           ),
// // // //         );
// // // //       });
// // // //     }   
// // // //   } catch  (error){
// // // //     print(error);
// // // //   }
// // // // }


// // // // GestureDetector(
// // // //   onTap: (){
// // // //     showLoaderDialog(context);
// // // //     sendData();
// // // //   },
// // // //   child: Icon(Icons.send_rounded,size: 35,color: Colors.deepPurpleAccent,)
// // // // ),

// // // // Future<void> getProfileUser () async {
// // // //   try{
// // // //     CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');
// // // //     _eventsSubscription  =   users
// // // //     .snapshots(includeMetadataChanges: true)
// // // //     .listen((querySnapshot){
// // // //       for (var doc in querySnapshot.docs) {
// // // //         if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
// // // //         { setState(() {
// // // //             fullName = doc["FullName"];
// // // //             avatar = doc["Avartar"];
// // // //             address = doc['Address'];
// // // //           });
// // // //         }
// // // //       }
// // // //     });
// // // //   }catch (error){
// // // //     print(error.toString());
// // // //   }
// // // // }

// // // // Widget BodyProfile () => Center(
// // // //   child: Column(
// // // //     mainAxisAlignment: MainAxisAlignment.center,
// // // //     crossAxisAlignment: CrossAxisAlignment.center,
// // // //     children: [
// // // //       //  ------------ FULL NAME DISPLAY -----------
// // // //       Padding(
// // // //         padding: const EdgeInsets.only(bottom: 8),
// // // //         child: Text(fullName,
// // // //         style:TextStyle(fontSize: 23, color: black, fontWeight: FontWeight.bold),),),
// // // //       //  ------------ ADDRESS DISPLAY -----------
// // // //       Row(
// // // //         mainAxisAlignment: MainAxisAlignment.center,
// // // //         crossAxisAlignment: CrossAxisAlignment.center,
// // // //         children: [
// // // //           const Padding(
// // // //             padding: EdgeInsets.only(right: 0),
// // // //             child: Icon(Icons.location_on_rounded,size: 15,color: Colors.grey,),
// // // //           ),
// // // //           Text(address ,
// // // //           style:TextStyle(fontSize: 15,fontWeight: FontWeight.normal,color: grey))
// // // //         ],
// // // //       ),
// // // //       //  ------------ LIST MENU SETTING -----------
// // // //       Padding(
// // // //         padding: const EdgeInsets.only(top: 20),
// // // //         child: MenuSettingContainer(),
// // // //       ),
// // // //       const Padding(
// // // //         padding: EdgeInsets.only(top:20, bottom: 0),
// // // //         child: Text('App version 1.0.1', style: TextStyle(fontSize: 13, color: grey),),
// // // //       )
// // // //     ],
// // // //   ),
// // // // );

// // // // //-------------3 THÔNG BẢNG PANEL : GIÁ TRỊ Present, TRẠNG THÁI Switch, MIN MAX 3 KHU VỰC ---------------
// // // // Widget SliderValue()=>SingleChildScrollView(
// // // //   scrollDirection: Axis.horizontal,
  
// // // //   child: Padding(
// // // //     padding: const EdgeInsets.only(left: 10,top: 15,right: 10,bottom: 15),
// // // //     child: Row(
// // // //       mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // //       children: [
// // // //         // ---------------Giá trị Hiện tại -----------------------------
// // // //         PresentWidget(),
// // // //         // ---------------Trạng thái công tắc-----------------------------
// // // //         SwitchWidget(),
// // // //         // --------------- Ngưỡng thiết lập MIN / MAX-----------------------------
// // // //         MinMaxWidget(),
// // // //       ],
// // // //     ),
// // // //   ),
// // // // );

// // Row(
// //     mainAxisAlignment: MainAxisAlignment.center,
// //     children: [
// //       const Text('Forgot password? ',style: TextStyle(
// //           color: Colors.black,
// //           fontWeight: FontWeight.bold
// //       ),),
// //       GestureDetector(
// //         onTap: (){
// //             Navigator.push(
// //               context,
// //               MaterialPageRoute(builder: (context) => const ForgotPasswordScreen()),
// //             );
// //           },
// //         child: const Text('Get Password',style: TextStyle(
// //             color: Colors.deepPurpleAccent,
// //             fontWeight: FontWeight.bold
// //         ),),
// //       )
// //     ],

// // ),

// // // SafeArea(
// // //   child: Center(
// // //     child: Container(
// // //         width: MediaQuery.of(context).size.width,
// // //         decoration:  const BoxDecoration(
// // //           color: Colors.white,
// // //         ),
// // //         child: Column(
// // //           crossAxisAlignment: CrossAxisAlignment.center,
// // //           children: [
// // //             Flexible(
// // //               child:
// // //               ListView(
// // //                 children: <Widget>[
// // //                   const Text(''),
// // //                   Column(
// // //                     mainAxisAlignment: MainAxisAlignment.center,
// // //                     crossAxisAlignment: CrossAxisAlignment.center,
// // //                     children: [
// // //                       //---------- Hien thi thoi gian, ngay thang va logo Smart Agri--------------
// // //                       Taskbar(),

// // //                       //------------------Text Title Screen -------------------
// // //                       Padding(
// // //                         padding: const EdgeInsets.only(top: 30),
// // //                         child: TextHome('Sensor parameters', 28, true,Colors.black),
// // //                       ),

// // //                       // -------------Table thông số-------------------
// // //                       Padding(
// // //                         padding: const EdgeInsets.only(top: 25),
// // //                         child: PanelHome(),
// // //                       ),

// // //                       // -----------------chú thích và ảnh cây trồng----------------
// // //                       NoteDetail(),
// // //                     ],
// // //                   ),
// // //                 ],
// // //               )
// // //             ),
// // //           ],
// // //         ),
// // //       ),
// // //   ),
// // // );

// TextField(
//     // focusNode: currentPasswordNode,
//     decoration: InputDecoration(
//       labelText: "Email",
//       fillColor: Colors.grey[100],
//       filled: true,
//       errorText: txtEmail.text.toString() != "" && !isEmail(txtEmail.text.toString)
//         ? "Please enter a valid email ..."
//         : null,
//       focusedBorder: OutlineInputBorder(
//         borderRadius: BorderRadius.circular(15),
//         borderSide: const BorderSide(color: Colors.deepPurpleAccent, width:  1.75 )
//       ),
//       border: OutlineInputBorder(
//         borderRadius: BorderRadius.circular(15),
//         borderSide: const BorderSide( color: Colors.pink, width: 0.75  )
//       )  
//     ),
//     controller:  txtEmail,
//   ),
// ), 
// // TextField(
// //     obscureText: isShowPass,
// //     decoration: InputDecoration(
// //       labelText: "Password",
// //       fillColor: Colors.grey[100],
// //       filled: true,
// //       focusedBorder: OutlineInputBorder(
// //         borderRadius: BorderRadius.circular(15),
// //         borderSide: const BorderSide(color: Colors.deepPurpleAccent, width:  1.75 )
// //       ),
// //       border: OutlineInputBorder(
// //         borderRadius: BorderRadius.circular(15),
// //         borderSide: const BorderSide( color: Colors.pink, width: 0.75  )
// //       )  ,
// //       suffixIcon: GestureDetector(
// //         onTap: (){
// //           setState(() {
// //             isShowPass = !isShowPass;
// //           });
// //         },
// //         child: Padding(
// //           padding: const EdgeInsets.only(right: 20),
// //           child: Icon(isShowPass? Icons.remove_red_eye_rounded : Icons.visibility_off_rounded, size: 27, color: Colors.grey,),
// //         )
// //       )
// //     ),
// //     controller:  txtPassword,
// //   ),
// // ), 


// // // // LineChart(
// // // //     LineChartData(
// // // //       lineTouchData: ChartTitle.lineTouchData1(),
// // // //       gridData: ChartTitle.gridData(),
// // // //       titlesData: FlTitlesData(
// // // //         bottomTitles: AxisTitles(
// // // //           sideTitles: SideTitles(...)
// // // //         ),
// // // //         rightTitles: AxisTitles(
// // // //           sideTitles: SideTitles(showTitles: false),
// // // //         ),
// // // //         topTitles: AxisTitles(
// // // //           sideTitles: SideTitles(showTitles: false),
// // // //         ),
// // // //         leftTitles: AxisTitles(...) 
// // // //       ),

// // // //       borderData: ChartTitle.borderData(),
// // // //       lineBarsData: [
// // // //         LineChartBarData(...),
// // // //         LineChartBarData(...),
// // // //         LineChartBarData(...),
// // // //       ],
// // // //       minX: 0,
// // // //       maxX: 13,
// // // //       maxY: double.parse(dataY[0].toString()),
// // // //       minY: double.parse(dataY[1].toString()),
// // // //     )
// // // // )