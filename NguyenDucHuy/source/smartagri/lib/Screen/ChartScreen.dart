// ignore_for_file: file_names, must_be_immutable, no_logic_in_create_state, avoid_print, non_constant_identifier_names

import 'dart:ui';

import 'package:flutter/material.dart';
import 'package:smartagri/helper/ChangeFloatToDate.dart';
import 'dart:math';
import '../components/chartHome.dart';
import '../data/chartData.dart';
import '../data/datasetField.dart';

class ChartScreen extends StatefulWidget {
  List <DataSet> dataHome;
  ChartScreen({Key? key, required this.dataHome}) : super(key: key);

  @override
  State<ChartScreen> createState() => _ChartScreenState(dataHome);
}

class _ChartScreenState extends State<ChartScreen> {

  final List <DataSet> dataHome;
  _ChartScreenState(this.dataHome);

  int indexMenu=1;

  List <chartData> dataChart =[
      chartData('0', '0', 1, 2, 3)
  ];

  List dataY =[0.0 , 0.0, 1];
  int index=2;

  List dataSlider = [];

  //-------- CHANGES LIST DATA WHEN CHOOSE MENU (NHIET DO, DO AM, ANH SANG)----------
  setDefaultMINMAXY(){
    setState(() {
      double maxy=0;
      double miny =0;

      double m1,m2,m3,min1,min2,min3;
      List<double> tam = [];

      //---------max khu vuc 1-----------
      for (int i=0;i<12;i++ ){
        tam.add(double.parse(dataChart[i].n1.toString()));
      }
      m1 = double.parse(tam.reduce(max).toString());
      min1 = double.parse(tam.reduce(min).toString());

      //----------max khu vuc 2----------
      tam.removeRange(0, tam.length);
      for (int i=0;i<12;i++ ){
        tam.add(double.parse(dataChart[i].n2.toString()));
      }
      m2 = double.parse(tam.reduce(max).toString());
      min2 = double.parse(tam.reduce(min).toString());

      //---------max khu vuc 3--------------
      tam.removeRange(0, tam.length);
      for (int i=0;i<12;i++ ){
        tam.add(double.parse(dataChart[i].n3.toString()));
      }
      m3 = double.parse(tam.reduce(max).toString());
      min3 = double.parse(tam.reduce(min).toString());

      maxy= m1;
      if (maxy < m2) maxy =m2;
      if (maxy < m3) maxy = m3;

      miny=min1;
      if(miny > min2) miny = min2;
      if(miny > min3) miny = min3;

      print('max = $maxy min = $miny');

      dataY.removeRange(0, 3);
      dataY.add(Changes().roundDataV2(maxy.toString(), true));
      dataY.add(Changes().roundDataV2(miny.toString(), false));
      dataY.add(indexMenu);
      print("max arr = ${dataY[0]} ---  ${dataY[1]}");
      print('Thousand = ${Changes().getThousand(150)} hundred ${Changes().getHundred(155)}');

      //Add data to dataSlider
      dataSlider.removeRange(0, dataSlider.length);
      if (indexMenu ==1)
        {
          double t1 = double.parse(dataHome[0].temperature1.toString())/10;       dataSlider.add(t1);
          t1 = double.parse(dataHome[0].temperature2.toString())/10;        dataSlider.add(t1);
          t1 = double.parse(dataHome[0].temperature3.toString())/10;       dataSlider.add(t1);

          t1 = double.parse(dataHome[0].ND_A1_MIN.toString())/10;       dataSlider.add(t1);
          t1 = double.parse(dataHome[0].ND_A2_MIN.toString())/10;    dataSlider.add(t1);
          t1 = double.parse(dataHome[0].ND_A3_MIN.toString())/10;      dataSlider.add(t1);

          t1 = double.parse(dataHome[0].ND_A1_MAX.toString())/10;       dataSlider.add(t1);
          t1 = double.parse(dataHome[0].ND_A2_MAX.toString())/10;    dataSlider.add(t1);
          t1 = double.parse(dataHome[0].ND_A3_MAX.toString())/10;      dataSlider.add(t1);
          dataSlider.add(1);
        }
      else
      if (indexMenu ==2)
      {
        double t1 = double.parse(dataHome[0].humidity1.toString())/10;
        dataSlider.add(t1);
        t1 = double.parse(dataHome[0].humidity2.toString())/10;
        dataSlider.add(t1);
        t1 = double.parse(dataHome[0].humidity3.toString())/10;
        dataSlider.add(t1);
        t1 = double.parse(dataHome[0].DA_A1_MIN.toString())/10;       dataSlider.add(t1);
        t1 = double.parse(dataHome[0].DA_A2_MIN.toString())/10;       dataSlider.add(t1);
        t1 = double.parse(dataHome[0].DA_A3_MIN.toString())/10;       dataSlider.add(t1);

        t1 = double.parse(dataHome[0].DA_A1_MAX.toString())/10;       dataSlider.add(t1);
        t1 = double.parse(dataHome[0].DA_A2_MAX.toString())/10;       dataSlider.add(t1);
        t1 = double.parse(dataHome[0].DA_A3_MAX.toString())/10;       dataSlider.add(t1);
        dataSlider.add(0);
      }
      else
      {
        // double t1= double.parse(data)
        dataSlider.add(dataHome[0].light1); dataSlider.add(dataHome[0].light2); dataSlider.add(dataHome[0].light3);
        dataSlider.add(dataHome[0].AS_A1_MIN);
        dataSlider.add(dataHome[0].AS_A2_MIN);
        dataSlider.add(dataHome[0].AS_A3_MIN);

        dataSlider.add(dataHome[0].AS_A1_MAX);
        dataSlider.add(dataHome[0].AS_A2_MAX);
        dataSlider.add(dataHome[0].AS_A3_MAX);
        dataSlider.add(0);
      }
    });
  }

  @override
  void initState() {
    super.initState();
    setState(() {
      dataChart.removeRange(0, dataChart.length);
      for (int i=11;i>=0;i--){
        var t1 = double.parse(dataHome[i].temperature1.toString())/10;
        var t2 = double.parse(dataHome[i].temperature2.toString())/10;
        var t3 = double.parse(dataHome[i].temperature3.toString())/10;

        var tam = chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
        dataChart.add(tam);
      }
      setDefaultMINMAXY();
    });
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Container(
        decoration: const BoxDecoration(
            image: DecorationImage(
              image: AssetImage("assets/images/anhdepV2.jpg"),
              fit: BoxFit.cover,
              
            ),
        ),
        width: MediaQuery.of(context).size.width,
        child: BackdropFilter(
          filter: ImageFilter.blur(sigmaX: 5.0, sigmaY: 5.0),
          child: Column(
            children: [
              //-----------------MENU ---------------------------------------------
              Stack(
                children: <Widget>[
                  Pannel(),
                  MenuContainer(),
                ],
              ),
              //---------------BODY-------------------
              BodyChartScreen(),
            ],
          ),
        ),
      ),
    );
  }

  //--------------------------------BODY STATEFULL ------------------------------------------
  Widget BodyChartScreen()=>Expanded(
    child: SingleChildScrollView(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          //-------------------- trang thai cong tac, nguong thiet lap, gia tri hien tai--------------
          SliderValue(),

          //------------------CHART_---------------------------
          ChartComponentImport(),

          //------------FOOTER-------------------
          Container(
            height: 5,
          ),
        ],
      ),
    ),
  );

  //-------------3 THÔNG BẢNG PANEL : GIÁ TRỊ Present, TRẠNG THÁI Switch, MIN MÃ 3 KHU VỰC ---------------
  Widget SliderValue()=>SingleChildScrollView(
    scrollDirection: Axis.horizontal,
    
    child: Padding(
      padding: const EdgeInsets.only(left: 10,top: 15,right: 10,bottom: 15),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.spaceAround,
        children: [
          // ---------------Giá trị Hiện tại -----------------------------
          Container(
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
            child: Padding(
              padding: const EdgeInsets.only(left: 25,right: 25,bottom: 20),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const Padding(
                    padding: EdgeInsets.only(top:15,bottom: 8),
                    child: Text("Present",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceAround,
                    children: [
                      const Text("Area 1: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                      Text(dataSlider[0].toString()),
                    ],
                  ),
                  Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
                    children: [
                      const Text("Area 2: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                      Text(dataSlider[1].toString()),
                    ],
                  ),
                  Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
                    children: [
                      const Text("Area 3: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                      Text(dataSlider[2].toString()),
                    ],
                  )
                ],
              ),
            ),
          ),
          // ---------------Trạng thái công tắc-----------------------------
          Padding(
            padding: const EdgeInsets.only(left: 15,right: 15),
            child: Container(
              width: MediaQuery.of(context).size.width*2/5,
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
              child: Padding(
                padding: const EdgeInsets.only(left: 25,right: 25,bottom: 20),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Padding(
                      padding: EdgeInsets.only(top:15,bottom: 8),
                      child: Text("Switch",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceAround,
                      children: [
                        const Text("Area 1: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                        dataSlider[dataSlider.length-1] == 1
                          ? dataSlider[0] > dataSlider[6]? const Text("ON"): const Text('OFF')
                          : dataSlider[0] < dataSlider[3]? const Text('ON'): const Text("OFF"),
                      ],
                    ),
                    Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
                      children: [
                        const Text("Area 2: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                        dataSlider[dataSlider.length-1] == 1
                            ? dataSlider[1] > dataSlider[7]? const Text("ON"): const Text('OFF')
                            : dataSlider[1] < dataSlider[4]? const Text('ON'): const Text("OFF"),
                      ],
                    ),
                    Row(mainAxisAlignment: MainAxisAlignment.spaceAround,
                      children: [
                        const Text("Area 3: ",style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                        dataSlider[dataSlider.length-1] == 1
                            ? dataSlider[2] > dataSlider[8]? const Text("ON"): const Text('OFF')
                            : dataSlider[2] < dataSlider[5]? const Text('ON'): const Text("OFF"),
                      ],
                    )
                  ],
                ),
              ),
            ),
          ),
          // --------------- Ngưỡng thiết lập MIN / MAX-----------------------------
          Container(
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
            child: Padding(
              padding: const EdgeInsets.only(left: 20,right: 20,bottom: 20),
              child: Column(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  const Padding(
                    padding: EdgeInsets.only(top:15,bottom: 8),
                    child: Text("Setting",style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold),),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      //----------Thiết Lập MIN----------------
                      Column(
                        children: [
                          Row(
                            children: [
                              const Text('Area 1-MIN: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                              Text(dataSlider[3].toString())
                            ],
                          ),
                          Row(
                            children: [
                              const Text('Area 2-MIN: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                              Text(dataSlider[4].toString())
                            ],
                          ),
                          Row(
                            children: [
                              const Text('Area 3-MIN: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                              Text(dataSlider[5].toString())
                            ],
                          )
                        ],
                      ),
                      //-------------THIẾT LẬP MAX-----------
                      Padding(
                        padding: const EdgeInsets.only(left: 15),
                        child: Column(
                          children: [
                            Row(
                              children: [
                                const Text('Area 1-MAX: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                                Text(dataSlider[6].toString())
                              ],
                            ),
                            Row(
                              children: [
                                const Text('Area 2-MAX: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                                Text(dataSlider[7].toString())
                              ],
                            ),
                            Row(
                              children: [
                                const Text('Area 3-MAX: ',style: TextStyle(fontSize: 16,fontWeight: FontWeight.bold)),
                                Text(dataSlider[8].toString())
                              ],
                            )
                          ],
                        ),
                      ),
                    ],
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    ),
  );

  //----------------------------------CHART COMPONENT----------------------------------
  Widget ChartComponentImport()=>Padding(
    padding: const EdgeInsets.only(top: 5,left: 5,right: 5),
    child: Container(
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(40),
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
        padding: const EdgeInsets.only(top: 3  ,left: 8,right: 8,bottom: 16),
        child: Column(
          children: [
            Center(
              child: Padding(
                padding: const EdgeInsets.only(top: 10,bottom: 15),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    const Text('Value Chart  ',style: TextStyle(fontSize: 18,color: Colors.black,fontWeight: FontWeight.bold)),
                    indexMenu ==1?
                    const Text('Temp',style: TextStyle(fontSize: 18,color: Colors.deepPurpleAccent,fontWeight: FontWeight.bold))
                        : indexMenu == 2? const Text('Humidity',style: TextStyle(fontSize: 18,color: Colors.deepPurpleAccent,fontWeight: FontWeight.bold))
                        : const Text('Light',style: TextStyle(fontSize: 18,color: Colors.deepPurpleAccent,fontWeight: FontWeight.bold)),
                  ],
                ),
              ),
            ),
            SizedBox(
                width: MediaQuery.of(context).size.width-20,
                height: MediaQuery.of(context).size.width-30,
                child: ChartHomePage(data: dataChart,dataY: dataY,index: index,)),
            Padding(
              padding: const EdgeInsets.only(top: 10,left: 20,right: 20),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceAround,
                children: [
                  Row(
                    children:const  [
                      Icon(Icons.linear_scale_outlined,size: 40,color: Colors.red,),
                      Text(' Area 1',style: TextStyle(color: Colors.red,fontWeight: FontWeight.bold),),
                    ],
                  ),
                  Row(
                    children:const  [
                      Icon(Icons.linear_scale_outlined,size: 40,color: Colors.blue,),
                      Text(' Area 2',style: TextStyle(color: Colors.blue,fontWeight: FontWeight.bold),),
                    ],
                  ),
                  Row(
                    children:const  [
                      Icon(Icons.linear_scale_outlined,size: 40,color: Colors.green,),
                      Text(' Area 3',style: TextStyle(color: Colors.green,fontWeight: FontWeight.bold),),
                    ],
                  )

                ],
              ),
            )
          ],
        ),
      ),
    ),
  );

  Widget MenuContainer()=>Padding(
    padding: const EdgeInsets.only(top:60),
    child: Center(
      child: Container(
        width: MediaQuery.of(context).size.width * 3/4 ,
        height: 50,
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(50),
          boxShadow: [
            BoxShadow(
              color: Colors.grey.withOpacity(0.5),
              spreadRadius: 5,
              blurRadius: 7,
              offset: const Offset(0, 3),
            ),
          ],
        ),
        child: Stack(
          alignment: Alignment.center,
          children: [
            MenuBackground(),
            MenuAnimation(),
          ],
        )
      ),
    ),
  );
  Widget MenuAnimation()=>AnimatedAlign(
    duration:const  Duration(milliseconds: 300),
    alignment: indexMenu ==  1 ? Alignment.centerLeft:
        indexMenu == 2 ? Alignment.center : Alignment.centerRight,
    child: Padding(
      padding: const EdgeInsets.all(8.0),
      child: Container(
          decoration: BoxDecoration(
              color: Colors.deepPurpleAccent,
              borderRadius: BorderRadius.circular(50)
          ),
          child: Padding(
            padding: const EdgeInsets.all(8.0),
            child: indexMenu ==1 ? const  Text(' Temp ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white)):
                  indexMenu == 2?  const Text('  Humidity  ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white)):
                  const Text(' Light ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white))
          )
      ),
    ),
  );

  Widget MenuBackground()=> Row(
    mainAxisAlignment: MainAxisAlignment.spaceAround,
    crossAxisAlignment: CrossAxisAlignment.end,
    children: [
      //----------Menu Temp----------
      GestureDetector(
        onTap: (){
          setState(() {
            indexMenu=1;
            index = 1;

            dataChart.removeRange(0, dataChart.length);
            for (int i=11; i>=0;i--){
              var t1 = double.parse(dataHome[i].temperature1.toString())/10;
              var t2 = double.parse(dataHome[i].temperature2.toString())/10;
              var t3 = double.parse(dataHome[i].temperature3.toString())/10;

              var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
              dataChart.add(tam);
            }
            // print('-----------------------');
            setDefaultMINMAXY();
          });
        },
        child: Container(
            decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(50)
            ),
            child: const Padding(
              padding: EdgeInsets.all(8.0),
              child: Text('Temp',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.deepPurple)),
            )
        ),
      ),

      //----------Menu Humidity----------
      GestureDetector(
        onTap: (){
          setState(() {
            indexMenu=2;
            // index = 2;
            dataChart.removeRange(0, dataChart.length);
            for (int i=11;i>=0;i--){
              var t1 = double.parse(dataHome[i].humidity1.toString())/10;
              var t2 = double.parse(dataHome[i].humidity2.toString())/10;
              var t3 = double.parse(dataHome[i].humidity3.toString())/10;

              var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
              dataChart.add(tam);
            }
            // print('-----------------------');
            setDefaultMINMAXY();
          });
        },
        child: Container(
            decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(50)
            ),
            child: const Padding(
              padding: EdgeInsets.all(8.0),
              child: Text('Humidity',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.deepPurple),),
            )
        ),
      ),

      //----------Menu Light----------
      GestureDetector(
        onTap: (){
          setState(() {
            indexMenu=3;
            // index = 3;

            dataChart.removeRange(0, dataChart.length);
            for (int i=11 ; i>=0 ; i--){
              var t1 = double.parse(dataHome[i].light1.toString())/100;
              var t2 = double.parse(dataHome[i].light2.toString())/100;
              var t3 = double.parse(dataHome[i].light3.toString())/100;
              // print
              var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
              dataChart.add(tam);
            }
            // print('-----------------------');
            setDefaultMINMAXY();
          });
        },
        child: Container(
            decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(50)
            ),
            child:const  Padding(
              padding: EdgeInsets.all(8.0),
              child:Text('Light',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.deepPurple),),
            )
        ),
      ),
    ],
  );

  //----------------------------------MENU Temp, Humidity, Light----------------------------------
  Widget Menu()=>Padding(
    padding: const EdgeInsets.only(top:60),
    child: Center(
      child: Container(
        width: MediaQuery.of(context).size.width * 3/4 ,
        height: 50,
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(50),
          boxShadow: [
            BoxShadow(
              color: Colors.grey.withOpacity(0.5),
              spreadRadius: 5,
              blurRadius: 7,
              offset: const Offset(0, 3),
            ),
          ],
        ),
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          children: [
            //----------Menu Temp----------
            GestureDetector(
              onTap: (){
                setState(() {
                  indexMenu=1;
                  index = 1;

                  dataChart.removeRange(0, dataChart.length);
                  for (int i=11; i>=0;i--){
                    var t1 = double.parse(dataHome[i].temperature1.toString())/10;
                    var t2 = double.parse(dataHome[i].temperature2.toString())/10;
                    var t3 = double.parse(dataHome[i].temperature3.toString())/10;

                    var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
                    dataChart.add(tam);
                  }
                  // print('-----------------------');
                  setDefaultMINMAXY();
                });
              },
              child: Container(
                  decoration: BoxDecoration(
                    color: indexMenu == 1 ? Colors.deepPurpleAccent : Colors.white,
                    borderRadius: BorderRadius.circular(50)
                  ),
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: indexMenu ==1 ?  const Text(' Temp ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
                        :const Text('Temp',style: TextStyle(fontSize: 13,color: Colors.black,fontWeight: FontWeight.normal),),
                  )
              ),
            ),

            //----------Menu Humidity----------
            GestureDetector(
              onTap: (){
                setState(() {
                  indexMenu=2;
                  // index = 2;
                  dataChart.removeRange(0, dataChart.length);
                  for (int i=11;i>=0;i--){
                    var t1 = double.parse(dataHome[i].humidity1.toString())/10;
                    var t2 = double.parse(dataHome[i].humidity2.toString())/10;
                    var t3 = double.parse(dataHome[i].humidity3.toString())/10;

                    var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
                    dataChart.add(tam);
                  }
                  // print('-----------------------');
                  setDefaultMINMAXY();
                });
              },
              child: Container(
                  decoration: BoxDecoration(
                      color: indexMenu == 2 ? Colors.deepPurpleAccent : Colors.white,
                      borderRadius: BorderRadius.circular(50)
                  ),
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: indexMenu ==2 ?  const Text(' Humidity ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
                        :const Text('Humidity',style: TextStyle(fontSize: 14,color: Colors.black,fontWeight: FontWeight.normal),),
                  )
              ),
            ),

            //----------Menu Light----------
            GestureDetector(
              onTap: (){
                setState(() {
                  indexMenu=3;
                  // index = 3;

                  dataChart.removeRange(0, dataChart.length);
                  for (int i=11 ; i>=0 ; i--){
                    var t1 = double.parse(dataHome[i].light1.toString())/100;
                    var t2 = double.parse(dataHome[i].light2.toString())/100;
                    var t3 = double.parse(dataHome[i].light3.toString())/100;
                    // print
                    var tam =chartData(dataHome[i].date,dataHome[i].time, t1, t2,  t3 );
                    dataChart.add(tam);
                  }
                  // print('-----------------------');
                  setDefaultMINMAXY();
                });
              },
              child: Container(
                  decoration: BoxDecoration(
                      color: indexMenu == 3 ? Colors.deepPurpleAccent : Colors.white,
                      borderRadius: BorderRadius.circular(50)
                  ),
                  child: Padding(
                    padding: const EdgeInsets.all(8.0),
                    child: indexMenu ==3 ?  const Text(' Light ',style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold,color: Colors.white),)
                        :const Text('Light',style: TextStyle(fontSize: 14,color: Colors.black,fontWeight: FontWeight.normal),),
                  )
              ),
            ),
          ],
        ),
      ),
    ),
  );

  //--------------TITLE SCREEN-------------------
  Widget Pannel()=>Container(
    width: MediaQuery.of(context).size.width,
    // height: 50,
    decoration: BoxDecoration(
        color: const Color(0xff6849ef) ,
        borderRadius: const BorderRadius.only(
          bottomLeft: Radius.circular(50.0),
          bottomRight: Radius.circular(50.0)
        ),
        
        gradient:const  LinearGradient(
            colors: [
              Color(0xff6849ef),
              Color(0xff886ff2),

              // Color(0xffFFFFFF),
            ]
        ),
        boxShadow: [
              BoxShadow(
                color: Colors.grey.withOpacity(0.5),
                spreadRadius: 5,
                blurRadius: 7,
                offset: const Offset(0, 3),
              ),
            ],
    ),
    child:const  Padding(
      padding: EdgeInsets.only(top: 20,bottom: 35),
      child: Center(
        child: Text('Data for the last 12 hours',
          style: TextStyle(
            fontSize: 21,
            fontWeight: FontWeight.bold,
            color: Colors.white,
          ),),
      ),
    ),
  );
}
