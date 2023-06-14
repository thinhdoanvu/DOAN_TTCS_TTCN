// ignore_for_file: file_names, must_be_immutable, no_logic_in_create_state, avoid_print, non_constant_identifier_names, unnecessary_null_comparison, prefer_if_null_operators

import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutter_spinkit/flutter_spinkit.dart';
import 'package:smartagri/components/ListComponent.dart';

import '../data/datasetField.dart';
import '../helper/ChangeFloatToDate.dart';
class ListScreen extends StatefulWidget {
  List <DataSet> dataHome;
  List <DataSet> listDataInit;
  ListScreen({Key? key, required this.dataHome, required this.listDataInit}) : super(key: key);

  @override
  State<ListScreen> createState() => _ListScreenState(dataHome, listDataInit);
}

class _ListScreenState extends State<ListScreen> {

  final List <DataSet> dataHome;
  final List <DataSet> listDataInit;
  _ListScreenState(this.dataHome, this.listDataInit);

  // List<DataSe>


  @override
  void initState() {
    super.initState();
    // ------------init gia tri lọc: gia trị bắt đầu, kết thúc;---------------
    setState(() {
      dateStart  = DateTime(
          DateTime.now().year,
          DateTime.now().month,
          DateTime.now().day);
      dateFinish  = dateStart;
    });
    //---------------loc gia tri để lấy thông số ngày cuối cùng------------------
    setState(() {
      dataTam.removeRange(0, dataTam.length);
      print(dateStart);
      print(DateTime.now().year.toString());
      DateTime datatam = DateTime(2021, 11, 27);

      for ( int i=0; i < listDataInit.length ; i++ ){
        datatam = DateTime(
          Changes().changeDoubleToDate(listDataInit[i].date!).year,
          Changes().changeDoubleToDate(listDataInit[i].date!).month,
          Changes().changeDoubleToDate(listDataInit[i].date!).day,
        );

        if(dateStart.compareTo(datatam) == 0 )
        {
          dataTam.add(dataHome[i]);
        }
          else{ break; }
      }
      print('Init dc ${dataTam.length} hang du lieu trong ${dataHome.length}');
    });
  }

  //----------------------------------------------------------------
  //----------------------------------------------------------------
  List <DataSet> dataTam =[];

  DateTime dateStart = DateTime(2022, 11, 27);
  DateTime dateFinish = DateTime(2022, 08, 16);

  int? sortColumnIndex = 0;
  // bool isAscending = false;

  String DateErrol = '';
  String DateErrolFinish = '';
  //----------------------------------------------------------------
  //----------------------------------------------------------------

//-------------------------function loc du lieu-----------------
  void LocData(){
    DateTime datatam = DateTime(2021, 11, 27);
    setState(() {
      dataTam.removeRange(0, dataTam.length);

      for(int i=0 ; i<dataHome.length ; i++)
      {
        datatam = DateTime(
          Changes().changeDoubleToDate(dataHome[i].date!).year,
          Changes().changeDoubleToDate(dataHome[i].date!).month,
          Changes().changeDoubleToDate(dataHome[i].date!).day,
        );

        if(dateStart.compareTo(datatam)<=0 && dateFinish.compareTo(datatam) >= 0)
        {
          dataTam.add(dataHome[i]);
        }
      }

      print('Sau khi loc dc ${dataTam.length} hang du lieu trong ${dataHome.length}');
    });
  }

  static const int sortName = 0;
  List <DataSet> listData = [];
  bool isAscending = true;
  int sortType = sortName;

  bool isFilter  = false;

  setFilterLoading(){
    setState(() {
      isFilter = true;
    });

    Timer(const Duration(seconds: 2), (){
      setState(() {
        isFilter = false;
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: SizedBox(
        width: MediaQuery.of(context).size.width,
        child: Column(
          children: [
            //-----------------------------Pannel Tiêu đề-----------------------------------
            PanelList(),

            //----------------------------Pannel hiển thị số dòng dữ liệu được lọc------------------------------------
            PanelLengthList(),

            //-----------------Table dữ liệu được lọc --------------------
            Flexible(
                child: isFilter 
                  ? Container(
                    decoration: const BoxDecoration(
                      color: Colors.white
                    ),
                    child: const Center(child: SpinKitChasingDots(color: Colors.deepPurpleAccent,size: 80.0,),)
                  )
                  :   ListComponent(dataHome: dataTam,)
            )
          ],
        ),
      ),
    );
  }

  Widget PanelList()=>Container(
    width: MediaQuery.of(context).size.width,
    // height: 100,
    decoration: const BoxDecoration(
      color: Color(0xff6849ef) ,
        borderRadius: BorderRadius.only(
            bottomLeft: Radius.circular(50.0),
        ),
      gradient: LinearGradient(
          colors: [
            Color(0xff6849ef),
            Color(0xff886ff2),
          ]
      )
    ),
    child: Title(),
  );

  Widget Title()=>Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children:   [
      const Padding(
        padding: EdgeInsets.only(top: 20, bottom: 7, left: 20),
        child: Text('Filter by date',
          style: TextStyle(
            fontSize: 26,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),
        ),
      ),

      Padding(
        padding: const EdgeInsets.only(left: 20,right: 35),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          children: const [
            Text('Data is displayed from ',style: TextStyle(
              fontSize: 20,
              fontWeight: FontWeight.bold,
              color: Colors.white,
            ),),
          ],
        ),
      ),

      Padding(
        padding: const EdgeInsets.only(left: 30,bottom: 20,right: 30,top:15),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [

            GestureDetector(
              onTap: () async {
                DateTime? newDate = await showGeneralDialog<DateTime>(
                  context: context,
                  pageBuilder: (context, anim1, anim2) {
                    return DatePickerDialog(
                    
                    initialDate: dateStart== null?  DateTime.now(): dateStart,
                    firstDate:	DateTime(2020),
                    lastDate: DateTime(2030),
                    helpText: "Start date",
                    );
                  },
                  transitionBuilder: (context, anim1, anim2, child) {
                    return SlideTransition(
                    position: anim1.drive(
                      Tween(
                        begin: const Offset(1, 0),
                        end:const  Offset(0, 0),
                      ),
                    ),
                    child: child,
                    );
                  },
                  transitionDuration: const Duration(milliseconds: 200),
                  barrierDismissible: true,
                  barrierLabel: '',
                );

                //-------------------------người dùng Cancel việc nhập dữ liệu---------------------------------------
                if(newDate == null) return;

                if(newDate.compareTo(dateFinish)> 0){
                  print('loi');

                  //-------------------------Alert thông báo lỗi---------------------------------------
                  showDialog<String>(
                    context: context,
                    builder: (BuildContext context) => AlertDialog(
                      title: const Text('Error'),
                      content: const Text('Start Date must be less than End Date'),
                      actions: <Widget>[
                        TextButton(
                          onPressed: () => Navigator.pop(context, 'OK'),
                          child: const Text('OK'),
                        ),
                      ],
                    ),
                  );
                  return ;
                }
                //-----------------------nếu không lỗi thì lấy dữ liệu và lọc-----------------------------------------
                setState(() {
                  DateErrol = '';
                  dateStart = newDate;
                });
                setFilterLoading();
                LocData();
              },
              child: Container(
                height: 38,
                // width: 130,
                decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(12)
                ),
                child: Center(
                  child: Text('   ${dateStart.day}/${dateStart.month}/${dateStart.year}   ',
                    style: const TextStyle(
                      fontSize: 15,
                      fontWeight: FontWeight.bold,
                      color: Colors.deepPurple,
                    ),
                  ),
                ),
              ),
            ),

            const Text('to',style: TextStyle(
              fontSize: 18,
              fontWeight: FontWeight.bold,
              color: Colors.white,
            ),),

            GestureDetector(
              onTap: () async {
                DateTime? newDate1 = await showGeneralDialog<DateTime>(
                  context: context,
                  pageBuilder: (context, anim1, anim2) {
                    return DatePickerDialog(
                    initialDate: dateFinish == null ? DateTime.now(): dateFinish,
                    firstDate:	DateTime(2020),
                    lastDate: DateTime(2030),
                    helpText: "End date",
                    );
                  },
                  transitionBuilder: (context, anim1, anim2, child) {
                    return SlideTransition(
                    position: anim1.drive(
                      Tween(
                        begin: const Offset(1, 0),
                        end: const Offset(0, 0),
                      ),
                    ),
                    child: child,
                    );
                  },
                  transitionDuration:const  Duration(milliseconds: 200),
                  barrierDismissible: true,
                  barrierLabel: '',
                );

                if(newDate1 == null) return;

                if(newDate1.compareTo(dateStart) < 0){
                  print('loi');
                  //-------------------------Alert thông báo lỗi---------------------------------------
                  showDialog<String>(
                    context: context,
                    builder: (BuildContext context) => AlertDialog(
                      title: const Text('Error'),
                      content: const Text('Start Date must be less than End Date'),
                      actions: <Widget>[
                        TextButton(
                          onPressed: () => Navigator.pop(context, 'OK'),
                          child: const Text('OK'),
                        ),
                      ],
                    ),
                  );
                  return ;
                }

                setState(() {
                  DateErrolFinish='';
                  dateFinish = newDate1;
                });
                setFilterLoading();
                LocData();
              },
              child: Container(
                height: 38,
                // width: 100,
                decoration: BoxDecoration(
                    color: Colors.white,
                    borderRadius: BorderRadius.circular(12)
                ),
                child: Center(
                  child: Text('   ${dateFinish.day}/${dateFinish.month}/${dateFinish.year}   ',
                  style: const TextStyle(
                    fontSize: 15,
                    fontWeight: FontWeight.bold,
                    color: Colors.deepPurple,
                  ),),
                ),
              ),
            ),
          ],
        ),
      ),

    ],
  );

  Widget PanelLengthList()=>
  Container(
      color: const  Color(0xff886ff2),
      width: MediaQuery.of(context).size.width,
      height: 60,
      child: Container(
        height: 50,
        width: MediaQuery.of(context).size.width,
        decoration: const BoxDecoration(
          color: Colors.white ,
          borderRadius: BorderRadius.only(
              topRight: Radius.circular(70.0)),
        ),
        child: Padding(
          padding: const EdgeInsets.only(top:16,left: 25),
          child:isFilter ? const Text('...',style: TextStyle(color: Colors.black,fontSize: 20,fontWeight: FontWeight.bold))
          : Text('${dataTam.length} lines of data',style: const TextStyle(color: Colors.black,fontSize: 20,fontWeight: FontWeight.bold)),
        ),
      ),

  );


}
