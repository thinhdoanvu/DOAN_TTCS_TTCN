// ignore_for_file: file_names
// Widget PanelHome(int stt, num n1, num n2, num n3)=>Padding(
//   padding: const EdgeInsets.only(bottom: 25),
//   child: Container(
//     width: MediaQuery.of(context).size.width-50,
//     // height: 50,
//     decoration: BoxDecoration(
//         color: Colors.grey[200],
//         borderRadius: BorderRadius.only(topRight: Radius.circular(85.0),bottomLeft: Radius.circular(85.0),)
//     ),
//     child: Padding(
//       padding: const EdgeInsets.only(top:25,bottom: 25,left: 55,right: 55),
//       child: Column(
//         crossAxisAlignment: CrossAxisAlignment.start,
//         children: [
//           Padding(
//             padding: const EdgeInsets.only(bottom: 20),
//             child: Text('Khu vực $stt',
//               style: TextStyle(
//                   fontWeight: FontWeight.bold, fontSize: 20
//               ),
//             ),
//           ),
//
//           Row(
//             crossAxisAlignment: CrossAxisAlignment.center,
//             mainAxisAlignment: MainAxisAlignment.spaceBetween,
//             children: [
//               Column(
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 mainAxisAlignment: MainAxisAlignment.center,
//                 children: [
//                   Container(
//                     child: Icon(Icons.thermostat,size:30) ,
//                     height: 45,
//                     width: 45,
//                     decoration: BoxDecoration(
//                         color: Colors.redAccent,
//                         borderRadius: BorderRadius.circular(50)
//                     ),
//                   ),
//
//                   Text(n1.toString(),style: TextStyle(fontSize: 20),),
//
//                 ],
//               ),
//
//               Column(
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 mainAxisAlignment: MainAxisAlignment.center,
//                 children: [
//                   Container(
//                     child: Icon(Icons.water_drop,size:30) ,
//                     height: 45,
//                     width: 45,
//                     decoration: BoxDecoration(
//                         color: Colors.blueAccent,
//                         borderRadius: BorderRadius.circular(50)
//                     ),
//                   ),
//
//                   Text(n2.toString(),style: TextStyle(fontSize: 20),),
//
//                 ],
//               ),
//
//               Column(
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 mainAxisAlignment: MainAxisAlignment.center,
//                 children: [
//                   Container(
//                     child: Icon(Icons.light_mode,size:30) ,
//                     height: 45,
//                     width: 45,
//                     decoration: BoxDecoration(
//                         color: Colors.greenAccent,
//                         borderRadius: BorderRadius.circular(50)
//                     ),
//                   ),
//
//                   Text(n3.toString(),style: TextStyle(fontSize: 20),),
//
//                 ],
//               ),
//               // Text('alo'),
//               // Text('alo'),
//             ],
//           ),
//         ],
//       ),
//     ),
//   ),
// );