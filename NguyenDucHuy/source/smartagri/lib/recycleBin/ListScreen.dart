// ignore_for_file: file_names
//
// Widget buildDataTable() {
//   // final columns = [
//   //   'Ngày', 'Thời gian', 'Độ ẩm 1', 'Độ ẩm 2', 'Độ ẩm 3',
//   //   'Nhiệt độ 1',"Nhiệt độ 2",'Nhiệt độ 3',
//   //   "Ánh sáng 1",'Ánh sáng 2','Ánh sáng 3'
//   // ];
//   return Column(
//     mainAxisAlignment: MainAxisAlignment.start,
//     crossAxisAlignment: CrossAxisAlignment.start,
//     children: [
//       HorizontalDataTable(
//         // horizontalScrollbarStyle: null,
//         // verticalScrollbarStyle: null,
//         leftHandSideColumnWidth: 50,
//         rightHandSideColumnWidth: 400,
//         isFixedHeader: true,
//         headerWidgets: _getTitleWidget(),
//         leftSideItemBuilder: _generateFirstColumnRow,
//         rightSideItemBuilder: _generateRightHandSideColumnRow,
//         itemCount: dataHome.length,
//         rowSeparatorWidget: const Divider(
//           color: Colors.black54,
//           height: 1.0,
//           thickness: 0.0,
//         ),
//         leftHandSideColBackgroundColor: Color(0xFFFFFFFF),
//         rightHandSideColBackgroundColor: Color(0xFFFFFFFF),
//       ),
//     ],
//   );
// }
//
//
// List<Widget> _getTitleWidget() {
//   return [
//     _getTitleItemWidget('STT', 50),
//     _getTitleItemWidget('Gio', 100),
//     _getTitleItemWidget('Nhiet do 1', 100),
//     _getTitleItemWidget('Nhiet do 2', 100),
//     _getTitleItemWidget('Nhiet do 3', 100),
//   ];
// }
//
// Widget _getTitleItemWidget(String label, double width) {
//   return Container(
//     child: Text(label, style: TextStyle(fontWeight: FontWeight.bold)),
//     width: width,
//     height: 56,
//     padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//     alignment: Alignment.center,
//   );
// }
//
// Widget _generateFirstColumnRow(BuildContext context, int index) {
//   return Container(
//     child: Text(index.toString()),
//     width: 50,
//     height: 52,
//     padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//     alignment: Alignment.center,
//   );
// }
//
// Widget _generateRightHandSideColumnRow(BuildContext context, int index) {
//   return Row(
//     children: <Widget>[
//       Container(
//         child: Row(
//           children: <Widget>[
//             Text(dataTam[index].date!),
//             // Text(" ${dataHome[index].time}")
//           ],
//         ),
//         width: 100,
//         height: 52,
//         padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//         alignment: Alignment.center,
//       ),
//       Container(
//         child: Text(dataTam[index].temperature1!.toString()),
//         width: 100,
//         height: 52,
//         padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//         alignment: Alignment.center,
//       ),
//       Container(
//         child: Text(dataTam[index].temperature2!.toString()),
//         width: 100,
//         height: 52,
//         padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//         alignment: Alignment.center,
//       ),
//       Container(
//         child: Text(dataTam[index].temperature3!.toString()),
//         width: 100,
//         height: 52,
//         padding: EdgeInsets.fromLTRB(5, 0, 0, 0),
//         alignment: Alignment.center,
//       ),
//     ],
//   );
// }

// List<DataColumn> getColumns(List<String> columns) => columns
//     .map((String column) => DataColumn(
//   label: Text(column,style: TextStyle(fontWeight: FontWeight.bold),),
//   onSort: onSort,
// )).toList();

// List<DataRow> getRows(List<DataSet> users) => users.map((DataSet user) {
//   String date =Changes().DateChange(user.date!);
//   String time = user.time!;
//   final cells = [
//     date, time,user.humidity1,user.humidity2,user.humidity3,
//     user.temperature1,user.temperature2,user.temperature3,
//     user.light1,user.light2,user.light3
//   ];
//   return DataRow(cells: getCells(cells));
// }).toList();
//
// List<DataCell> getCells(List<dynamic> cells) =>
//     cells.map((data) => DataCell(Text('$data'))).toList();
//
// void onSort(int columnIndex, bool ascending) {
//   if (columnIndex == 0) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, user1.date!, user2.date!));
//   } else if (columnIndex == 1) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, user1.time!, user2.time!));
//   } else if (columnIndex == 2) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.humidity1}', '${user2.humidity1}'));
//   }else if (columnIndex == 3) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.humidity2}', '${user2.humidity2}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.humidity3}', '${user2.humidity3}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.temperature1}', '${user2.temperature1}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.temperature2}', '${user2.temperature2}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.temperature3}', '${user2.temperature3}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.light1}', '${user2.light1}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.light2}', '${user2.light2}'));
//   }else if (columnIndex ==4) {
//     dataTam.sort((user1, user2) =>
//         compareString(ascending, '${user1.light3}', '${user2.light3}'));
//   }
//
//   setState(() {
//     this.sortColumnIndex = columnIndex;
//     this.isAscending = ascending;
//   });
// }
//
// int compareString(bool ascending, String value1, String value2) =>
//     ascending ? value1.compareTo(value2) : value2.compareTo(value1);

// Future<void> _showMyDialog() async {
//   return showDialog<void>(
//     context: context,
//     barrierDismissible: false, // user must tap button!
//     builder: (BuildContext context) {
//       return AlertDialog(
//         title: const Text('AlertDialog Title'),
//         content: SingleChildScrollView(
//           child: ListBody(
//             children: const <Widget>[
//               Text('This is a demo alert dialog.'),
//               Text('Would you like to approve of this message?'),
//             ],
//           ),
//         ),
//         actions: <Widget>[
//           TextButton(
//             child: const Text('Approve'),
//             onPressed: () {
//               Navigator.of(context).pop();
//             },
//           ),
//         ],
//       );
//     },
//   );
// }



// ListView(
//   children: <Widget>[
// SingleChildScrollView(
//     scrollDirection: Axis.horizontal,
//     child: SingleChildScrollView(
//         child:
// Container(
//   height: 500,
//     child: buildDataTable()
// )
// )
// ),
// ],
// )