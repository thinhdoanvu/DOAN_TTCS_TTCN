// ignore_for_file: file_names
// // // // Widget TimeStartAndEndV2()=>Container(
// // // //   // width: 100,
// // // //   // height: 75,
// // // //   decoration: BoxDecoration(
// // // //       color: Colors.pink
// // // //   ),
// // // //   child: Row(
// // // //     mainAxisAlignment: MainAxisAlignment.spaceAround,
// // // //     children: [
// // // //
// // // //       Text("${timeStart.hour}: ${timeStart.minute}"),
// // // //
// // // //       ElevatedButton(
// // // //           onPressed: () async{
// // // //             await showTimePicker(
// // // //               context: context,
// // // //               initialTime: timeStart,
// // // //               // hourLabelText: timeStart.hour
// // // //             );
// // // //           },
// // // //           child: Text('Pick Time')
// // // //       )
// // // //     ],
// // // //   ),
// // // // );
// // // //
// // // // Widget TimeStartAndEnd()=>Padding(
// // // //   padding: const EdgeInsets.only(top: 25),
// // // //   child: Container(
// // // //     width: MediaQuery.of(context).size.width*5/6,
// // // //     // height: 50,
// // // //     decoration: BoxDecoration(
// // // //       color: Colors.grey[200],
// // // //       borderRadius: BorderRadius.circular(50),
// // // //       boxShadow: [
// // // //         BoxShadow(
// // // //           color: Colors.grey.withOpacity(0.5),
// // // //           spreadRadius: 5,
// // // //           blurRadius: 7,
// // // //           offset: Offset(0, 3),
// // // //         ),
// // // //       ],
// // // //     ),
// // // //     child: Row(
// // // //       mainAxisAlignment: MainAxisAlignment.spaceBetween,
// // // //       crossAxisAlignment: CrossAxisAlignment.center,
// // // //       children: [
// // // //         //------------START------------------
// // // //         Column(
// // // //           mainAxisAlignment: MainAxisAlignment.center,
// // // //           children: [
// // // //             // Icon(Icons.access_time_rounded),
// // // //             GestureDetector(
// // // //               child: Container(
// // // //                   decoration: BoxDecoration(
// // // //                       color: Colors.deepPurpleAccent,
// // // //                       borderRadius: BorderRadius.circular(50)
// // // //                   ),
// // // //                   child: Padding(
// // // //                     padding: const EdgeInsets.only(left: 30,right: 30,bottom: 15,top: 15),
// // // //                     child: Text('   ${timeStart.hour}:00   ',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.white),),
// // // //                   )),
// // // //               onTap: () async{
// // // //                 await showTimePicker(
// // // //                   context: context,
// // // //                   initialTime: timeStart,
// // // //                   // hourLabelText: timeStart.hour
// // // //                 );
// // // //               },
// // // //             ),
// // // //           ],
// // // //         ),
// // // //         //----MIDDLE-------
// // // //         Icon(Icons.arrow_circle_right_rounded,size: 40,),
// // // //         //------------END------------------
// // // //         Column(
// // // //           mainAxisAlignment: MainAxisAlignment.center,
// // // //           children: [
// // // //             // Icon(Icons.access_time_rounded),
// // // //             GestureDetector(
// // // //               child: Container(
// // // //                   decoration: BoxDecoration(
// // // //                       color: Colors.deepPurpleAccent,
// // // //                       borderRadius: BorderRadius.circular(50)
// // // //                   ),
// // // //                   child: Padding(
// // // //                     padding: const EdgeInsets.only(left: 30,right: 30,bottom: 15,top: 15),
// // // //                     child: Text('   ${timeStart.hour}:00   ',style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.white),),
// // // //                   )),
// // // //               onTap: () async{
// // // //                 await showTimePicker(
// // // //                   context: context,
// // // //                   initialTime: timeStart,
// // // //                   // hourLabelText: timeStart.hour
// // // //                 );
// // // //               },
// // // //             ),
// // // //           ],
// // // //         ),
// // // //       ],
// // // //     ),
// // // //   ),
// // // // );
// // //
// // // DropdownButtonHideUnderline(
// // // child: DropdownButton2(
// // // isExpanded: true,
// // // // hint: Text('08:00',style: TextStyle(fontSize: 14,fontWeight: FontWeight.bold,color: Colors.yellow,),
// // // // ),
// // // items: items
// // //     .map((item) =>
// // // DropdownMenuItem<String>(
// // // value: item,
// // // child: Text(
// // // item,
// // // style: const TextStyle(
// // // fontSize: 14,
// // // fontWeight: FontWeight.bold,
// // // color: Colors.deepPurple,
// // // ),
// // // overflow: TextOverflow.ellipsis,
// // // ),
// // // ))
// // // .toList(),
// // // value: selectedValue,
// // // onChanged: (value) {
// // // setState(() {
// // // selectedValue = value as String;
// // // });
// // // },
// // // // icon: const Icon(
// // // //   Icons.arrow_forward_ios_outlined,
// // // // ),
// // // // iconSize: 14,
// // // // iconEnabledColor: Colors.yellow,
// // // // iconDisabledColor: Colors.grey,
// // // buttonHeight: 40,
// // // buttonWidth: 75,
// // // buttonPadding: const EdgeInsets.only(left: 8, right: 0),
// // // buttonDecoration: BoxDecoration(
// // // borderRadius: BorderRadius.circular(75),
// // // border: Border.all(
// // // color: Colors.black26,
// // // ),
// // // color: Colors.white,
// // // ),
// // // buttonElevation: 2,
// // // itemHeight: 40,
// // // itemPadding: const EdgeInsets.only(left: 14, right: 14),
// // // dropdownMaxHeight: 200,
// // // dropdownWidth: 100,
// // // dropdownPadding: null,
// // // dropdownDecoration: BoxDecoration(
// // // borderRadius: BorderRadius.circular(14),
// // // color: Colors.white,
// // // ),
// // // dropdownElevation: 8,
// // // scrollbarRadius: const Radius.circular(40),
// // // scrollbarThickness: 6,
// // // scrollbarAlwaysShow: false,
// // // offset: const Offset(-20, 0),
// // // ),
// // // ),
// //
// //
// // RollingSwitch.icon(
// // initialState: true,
// // width: 90,
// // height: 50,
// // // innerSize: 40,
// // onChanged: (bool state) {
// // print('turned ${(state) ? 'on' : 'off'}');
// // },
// // rollingInfoRight: const RollingIconInfo(
// // icon: Icons.done,
// // text: Text('Auto'),
// // ),
// // rollingInfoLeft: const RollingIconInfo(
// // icon: Icons.highlight_off_rounded,
// // backgroundColor: Colors.grey,
// // text: Text('Manu'),
// // ),
// // )
//
//
// // AnimatedOpacity(
// // duration: Duration( seconds: 2),
// // opacity: 0,
// // child:
// // )
//
//
//
//
//
//
// // Widget MenuContainer()=>Padding(
// //   padding: const EdgeInsets.only(top:18,left: 35,right: 35,bottom: 18),
// //   child: Container(
// //     child: Row(
// //       mainAxisAlignment: MainAxisAlignment.spaceBetween,
// //       children: [
// //         MenuSetting(),
// //         DataPresent()
// //       ],
// //     ),
// //   ),
// // );
//
// Widget DataPresent()=>Container(
//   // width: MediaQuery.of(context).size.width/3,
//   // height: 40,
//   decoration: BoxDecoration(
//     color: Colors.white,
//     borderRadius: BorderRadius.circular(25),
//     boxShadow: [
//       BoxShadow(
//         color: Colors.grey.withOpacity(0.5),
//         spreadRadius: 5,
//         blurRadius: 7,
//         offset: Offset(0, 3),
//       ),
//     ],
//   ),
//   child: Padding(
//     padding: const EdgeInsets.only(left: 25,right: 25,bottom: 20),
//     child: Column(
//       mainAxisAlignment: MainAxisAlignment.center,
//       children: [
//         Padding(
//           padding: const EdgeInsets.only(top:15,bottom: 8),
//           child: Text("Hiện tại",style: TextStyle(fontSize: 20 ,fontWeight: FontWeight.bold),),
//         ),
//         Row(
//           mainAxisAlignment: MainAxisAlignment.spaceAround,
//           children: [
//             Text("KV-1:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.red)),
//             Text("1.2",style: TextStyle(fontSize: 16)),
//           ],
//         ),
//         Padding(
//           padding: const EdgeInsets.only(top: 2,bottom: 2),
//           child: Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
//             children: [
//               Text("KV-2:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.blue)),
//               Text('23423',style: TextStyle(fontSize: 16)),
//             ],
//           ),
//         ),
//         Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
//           children: [
//             Text("KV-3:  ",style: TextStyle(fontSize: 18,fontWeight: FontWeight.bold,color: Colors.green)),
//             Text('324',style: TextStyle(fontSize: 16),),
//           ],
//         )
//       ],
//     ),
//   ),
// );
//
// // Widget Copy()=>GestureDetector(
// // onTap: () {
// //   setState(() {
// //     selected = !selected;
// //   });
// // },
// // child: Center(
// //   child: AnimatedContainer(
// //     width: selected ? 200.0 : 100.0,
// //     height: selected ? 100.0 : 200.0,
// //     color: selected ? Colors.red : Colors.blue,
// //     alignment:
// //       selected ? Alignment.center : AlignmentDirectional.topCenter,
// //     duration: const Duration(seconds: 2),
// //     curve: Curves.fastOutSlowIn,
// //     child: const Text('ALo'),
// //   ),
// //   ),
// // );
//
// Widget MenuSetting()=>AnimatedContainer(
//   duration: Duration(milliseconds: 2000),
//   curve: Curves.fastOutSlowIn,
//   alignment: index == 1? AlignmentDirectional.topCenter:
//   index == 2? Alignment.center: AlignmentDirectional.bottomCenter,
//   // width: MediaQuery.of(context).size.width */5,
//   decoration: BoxDecoration(
//     color: Colors.white,  //purple[100]
//     borderRadius: BorderRadius.circular(25),
//     boxShadow: [
//       BoxShadow(
//         color: Colors.grey.withOpacity(0.5),
//         spreadRadius: 5,
//         blurRadius: 7,
//         offset: Offset(0, 3),
//       ),
//     ],
//   ),
//   child: Padding(
//     padding: const EdgeInsets.all(8.0),
//     child: Column(
//       mainAxisAlignment: MainAxisAlignment.center,
//       crossAxisAlignment: CrossAxisAlignment.center,
//       children: [
//
//
//       ],
//     ),
//   ),
// );
//
// Widget MenuContainerMain()=> AnimatedContainer(
//   width: MediaQuery.of(context).size.width/2,
//   height: 300,
//   decoration: BoxDecoration(
//       color: Colors.pink
//   ),
//   duration: Duration(milliseconds: 2000),
//   curve: Curves.fastOutSlowIn,
//   alignment: index == 1? AlignmentDirectional.topCenter:
//   index == 2? Alignment.center: AlignmentDirectional.bottomCenter,
//   // _visible? AlignmentDirectional.topCenter: AlignmentDirectional.bottomCenter,
//   child: Container(
//     width: MediaQuery.of(context).size.width/2,
//     height: 100,
//     decoration: BoxDecoration(
//         color: Colors.blue
//     ),
//   ),
//
//
// );
//
// bool _visible = true;
//
// Widget TestBackGround()=>AnimatedOpacity(
//   opacity: _visible ? 1.0 : 0.0,
//   duration: const Duration(milliseconds: 500),
//   child: Container(
//     height: 50,width: 50,
//     decoration: BoxDecoration(
//       color: Colors.pink,
//     ),
//   ),
// );
//
// Widget TestStack()=>Stack(
//   children: [
//     TestBackGround(),
//     Text('alo'),
//   ],
// );
//
//
// // int index =1;
//
// Widget OneItem()=>
//     Stack(
//       children: [
//         AnimatedOpacity(
//           duration: Duration( milliseconds: 500),
//           opacity: _visible ? 1.0 : 0.0,
//           child: Container(
//             width: 100,
//             height: 50,
//             decoration: BoxDecoration(
//               color: Colors.deepPurple,
//               borderRadius: BorderRadius.circular(50),
//             ),
//           ),
//         ),
//         Container(
//           decoration: BoxDecoration(
//             // color: index == 1 ? Colors.deepPurple : Colors.white,
//             borderRadius: BorderRadius.circular(50),
//           ),
//           child: GestureDetector(
//             onTap: (){
//               setState(() {
//                 index= 1;
//                 print("Menu $index");
//
//               });
//             },
//             child: Padding(
//               padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
//               child: Row(
//                 mainAxisAlignment: index == 1? MainAxisAlignment.spaceBetween: MainAxisAlignment.center,
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 children: [
//                   Text(' Nhiệt độ ',style: TextStyle(color: index == 1? Colors.black: Colors.deepPurple,fontSize: 16,fontWeight: FontWeight.bold),),
//                   index == 1? Icon(Icons.arrow_right_rounded, color: Colors.white) : Text(''),
//                 ],
//               ),
//             ),
//           ),
//         ),
//       ],
//     );
//
// // Widget MenuSetting()=>Container(
// //
// //   width: MediaQuery.of(context).size.width /2,
// //   height: 200,
// //   decoration: BoxDecoration(
// //     color: Colors.white,  //purple[100]
// //     borderRadius: BorderRadius.circular(25),
// //     boxShadow: [
// //       BoxShadow(
// //         color: Colors.grey.withOpacity(0.5),
// //         spreadRadius: 5,
// //         blurRadius: 7,
// //         offset: Offset(0, 3),
// //       ),
// //     ],
// //   ),
// //   child: Padding(
// //     padding: const EdgeInsets.all(8.0),
// //     child: Column(
// //       mainAxisAlignment: MainAxisAlignment.center,
// //       crossAxisAlignment: CrossAxisAlignment.center,
// //       children: [
// //         //---------------------------NHIỆT ĐỘ --------------------------
// //     Stack(
// //     children: [
// //       AnimatedOpacity(
// //       duration: Duration( milliseconds: 500),
// //       opacity: _visible ? 1.0 : 0.0,
// //       child: Container(
// //         decoration: BoxDecoration(
// //           color:  Colors.deepPurple ,
// //           borderRadius: BorderRadius.circular(50),
// //           ),
// //         child: Padding(
// //           padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
// //           child: Row(
// //             mainAxisAlignment: MainAxisAlignment.center,
// //             crossAxisAlignment: CrossAxisAlignment.center,
// //             children: [
// //               Text(' Nhiệt độ ',style: TextStyle(color: index == 1? Colors.black: Colors.deepPurple,fontSize: 16,fontWeight: FontWeight.bold),),
// //               index == 1? Icon(Icons.arrow_right_rounded, color: Colors.black) : Text(''),
// //             ],
// //           ),
// //         ),
// //         ),
// //       ),
// //       GestureDetector(
// //         onTap: (){
// //           setState(() {
// //             index= 1;
// //             print("Menu $index");
// //
// //           });
// //         },
// //         child: Padding(
// //           padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
// //           child: Row(
// //             mainAxisAlignment: MainAxisAlignment.center,
// //             crossAxisAlignment: CrossAxisAlignment.center,
// //             children: [
// //               Text(' Nhiệt độ ',style: TextStyle(color: index == 1? Colors.black: Colors.deepPurple,fontSize: 16,fontWeight: FontWeight.bold),),
// //               index == 1? Icon(Icons.arrow_right_rounded, color: Colors.black) : Text(''),
// //             ],
// //           ),
// //         ),
// //       ),
// //   ],
// // ),
// //         //-------------------ĐỘ ẨM----------------------
// //         Container(
// //           decoration: BoxDecoration(
// //             color: index == 2 ? Colors.deepPurple : Colors.white,
// //             borderRadius: BorderRadius.circular(50),
// //           ),
// //           child: GestureDetector(
// //             onTap: (){
// //               setState(() {
// //                 index= 2;
// //                 print("Menu $index");
// //
// //               });
// //             },
// //             child: Padding(
// //               padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
// //               child: Row(
// //                 mainAxisAlignment: index == 2? MainAxisAlignment.spaceBetween: MainAxisAlignment.center,
// //                 crossAxisAlignment: CrossAxisAlignment.center,
// //                 children: [
// //                   Text('   Độ ẩm   ',style: TextStyle(color: index == 2? Colors.white: Colors.deepPurple,fontSize: 16,fontWeight: FontWeight.bold),),
// //                   index == 2? Icon(Icons.arrow_right_rounded, color: Colors.white) : Text(''),
// //                 ],
// //               ),
// //             ),
// //           ),
// //         ),
// //         //------------------------ÁNH SÁNG -----------------
// //         Container(
// //           decoration: BoxDecoration(
// //             color: index == 3 ? Colors.deepPurple : Colors.white,
// //             borderRadius: BorderRadius.circular(50),
// //           ),
// //           child: GestureDetector(
// //             onTap: (){
// //               setState(() {
// //                 index= 3;
// //                 print("Menu $index");
// //
// //               });
// //             },
// //             child: Padding(
// //               padding: const EdgeInsets.only(top:10,bottom: 10,left: 16,right: 16),
// //               child: Row(
// //                 mainAxisAlignment: index == 3? MainAxisAlignment.spaceBetween: MainAxisAlignment.center,
// //                 crossAxisAlignment: CrossAxisAlignment.center,
// //                 children: [
// //                   Text('Ánh sáng',style: TextStyle(color: index == 3? Colors.white: Colors.deepPurple,fontSize: 16,fontWeight: FontWeight.bold),),
// //                   index == 3? Icon(Icons.arrow_right_rounded, color: Colors.white) : Text(''),
// //                 ],
// //               ),
// //             ),
// //           ),
// //         ),
// //       ],
// //     ),
// //   ),
// // );