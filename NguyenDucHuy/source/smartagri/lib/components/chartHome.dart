// ignore_for_file: unused_local_variable, file_names

import 'package:flutter/material.dart';
import 'package:fl_chart/fl_chart.dart';

import 'package:smartagri/data/chartData.dart';

import '../helper/ChangeFloatToDate.dart';
import 'chartTitle.dart';

// ignore: must_be_immutable
class ChartHomePage extends StatefulWidget {
  List <chartData> data;
  List dataY;
  int index;
  ChartHomePage({ Key? key, required this.data, required this.dataY, required this.index }) : super(key: key);

  @override
  // ignore: no_logic_in_create_state
  State<ChartHomePage> createState() => _ChartHomePageState(data,dataY,index);
}

class _ChartHomePageState extends State<ChartHomePage> {

  final List <chartData> data;
  final List dataY;
  final int index;
  _ChartHomePageState(this.data,this.dataY, this.index);



  @override
  void initState() => super.initState();

  @override
  Widget build(BuildContext context) =>
      Container(
          color: Colors.white,
          width: 500,
          height: 500,
          child: LineChart(
              LineChartData(
                lineTouchData: ChartTitle.lineTouchData1(),
                gridData: ChartTitle.gridData(),
                titlesData: FlTitlesData(
                  bottomTitles: AxisTitles(
                    sideTitles: SideTitles(
                      getTitlesWidget: (double value, TitleMeta meta) {
                        const style = TextStyle(
                          color: Color(0xff72719b),
                          fontWeight: FontWeight.bold,
                          fontSize: 16,
                        );
                        Widget text;
                        switch (value.toInt()) {
                          case 1:
                            text = Text(Changes().getTime(
                                data[data.length - 12].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 2:
                            text = Text(Changes().getTime(
                                data[data.length - 11].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 3:
                            text = Text(Changes().getTime(
                                data[data.length - 10].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 4:
                            text = Text(Changes().getTime(
                                data[data.length - 9].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 5:
                            text = Text(Changes().getTime(
                                data[data.length - 8].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 6:
                            text = Text(Changes().getTime(
                                data[data.length - 7].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 7:
                            text = Text(Changes().getTime(
                                data[data.length - 6].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 8:
                            text = Text(Changes().getTime(
                                data[data.length - 5].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 9:
                            text = Text(Changes().getTime(
                                data[data.length - 4].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 10:
                            text = Text(Changes().getTime(
                                data[data.length - 3].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 11:
                            text = Text(Changes().getTime(
                                data[data.length - 2].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          case 12:
                            text = Text(Changes().getTime(
                                data[data.length - 1].time!.toString()),
                              style: const TextStyle(fontSize: 16,),);
                            break;
                          default:
                            text = const Text('');
                            break;
                        }

                        return SideTitleWidget(
                          axisSide: meta.axisSide,
                          space: 10,
                          child: RotationTransition(
                            turns: const AlwaysStoppedAnimation(-45 / 360),
                            child: text,
                          ),
                        );
                      },
                      showTitles: true,
                      interval: 1,
                      reservedSize: 40,
                    ),
                  ),
                  rightTitles: AxisTitles(
                    sideTitles: SideTitles(showTitles: false),
                  ),
                  topTitles: AxisTitles(
                    sideTitles: SideTitles(showTitles: false),
                  ),
                  leftTitles: AxisTitles(
                    sideTitles: SideTitles(
                      getTitlesWidget: (double value, TitleMeta meta) {
                        const style = TextStyle(
                          color: Color(0xff75729e),
                          fontWeight: FontWeight.bold,
                          fontSize: 14,
                        );
                        String text;
                        //------------------MAX---------------------
                        if(value.toInt() == dataY[0]) {
                          if (dataY[2]==3 ) {
                            if (Changes().getHundred(dataY[0])=="0"){
                              text = "${Changes().getThousand(dataY[0])}k";
                            }else {
                              text = "${Changes().getThousand(dataY[0])}k${Changes().getHundred(dataY[0])}";
                            }
                          }
                          else {
                            text = dataY[0].toString();
                          }
                        }
                        //------------------MIN---------------------
                        else if(value.toInt() == dataY[1]) {
                          if (dataY[2]==3 ) {
                            if (dataY[1] == 0){
                              text = "0";
                            }else {
                              if (Changes().getHundred(dataY[1])=="0"){
                                text = "${Changes().getThousand(dataY[1])}k";
                              }else {
                                text = "${Changes().getThousand(dataY[1])}k${Changes().getHundred(dataY[1])}";
                              }
                            }
                          }
                          else {
                            text = dataY[1].toString();
                          }
                        }
                        //------------------4 GIA TRI---------------------
                        else if((dataY[0] - dataY[1]) % 3 == 0) {
                          int tam= (dataY[0]- dataY[1]) ~/ 3;
                          if (dataY[1] +  tam == value.toInt())
                            {
                              if (dataY[2] == 3 ) {
                                text = "${Changes().getThousand(dataY[1] +  tam)}k";
                                if (Changes().getHundred(dataY[1] +  tam) == "0") {
                                  text = text;
                                } else {
                                  text = text + Changes().getHundred(dataY[1] +  tam);
                                }
                              }
                              else {
                                text = (dataY[1] +  tam).toString();
                              }
                            }
                          else {
                            if (dataY[0] -  tam == value.toInt())
                            {
                              if (dataY[2]==3 ) {
                                text = "${Changes().getThousand(dataY[0] -  tam)}k";
                                if (Changes().getHundred(dataY[0] -  tam) == "0") {
                                  text = text;
                                } else {
                                  text = text + Changes().getHundred(dataY[0] -  tam);
                                }
                              }
                              else {
                                text = (dataY[0] -  tam).toString();
                              }
                            } else {
                              text = "";
                            }
                          }
                        }
                        //------------------5 GIA TRI---------------------
                        else if((dataY[0] - dataY[1]) % 4 == 0) {
                          int tam= (dataY[0]- dataY[1]) ~/ 4;
                          if (dataY[1] +  tam == value.toInt())
                          {
                            if (dataY[2]==3 ) {
                              text = "${Changes().getThousand(dataY[1] +  tam)}k";
                              if (Changes().getHundred(dataY[1] +  tam) == "0") {
                                text = text;
                              } else {
                                text = text +Changes().getHundred(dataY[1] +  tam);
                              }
                            }
                            else {
                              text = (dataY[1] +  tam).toString();
                            }
                          }
                          else {
                            if (dataY[0] -  tam == value.toInt())
                            {
                              if (dataY[2]==3 ) {
                                text = "${Changes().getThousand(dataY[0] -  tam)}k";
                                if (Changes().getHundred(dataY[0] -  tam) == "0") {
                                  text = text;
                                } else {
                                  text = text + Changes().getHundred(dataY[0] -  tam);
                                }
                              }
                              else {
                                text = (dataY[0] -  tam).toString();
                              }
                            } else
                                if(dataY[0] -  tam * 2 == value.toInt()){
                                      if (dataY[2]==3 ) {
                                        text = "${Changes().getThousand(dataY[0] -  tam*2)}k";
                                        if (Changes().getHundred(dataY[0] -  tam*2) == "0") {
                                          text = text;
                                        } else {
                                          text = text + Changes().getHundred(dataY[0] -  tam*2);
                                        }
                                      }
                                      else {
                                        text = (dataY[0] -  tam*2).toString();
                                      }
                                } else {
                                  text = "";
                                }
                          }
                        }

                        //-----------------3 GIA TRI ---------------
                        else  if((dataY[0] - dataY[1]) % 2 == 0){
                          int tam= (dataY[0]- dataY[1]) ~/ 2;
                          if (dataY[1] +  tam == value.toInt()) {
                            if (dataY[2]==3 ) {
                              text = "${Changes().getThousand(dataY[0] -  tam)}k";
                              if (Changes().getHundred(dataY[0] -  tam) == "0") {
                                text = text;
                              } else {
                                text = text +Changes().getHundred(dataY[0] -  tam);
                              }
                            }
                            else {
                              text = (dataY[0] -  tam).toString();
                            }
                          }
                          else {
                            text="";
                          }
                        }
                        else {
                          text="";
                        }
                        return Text( text.isNotEmpty && text[0] == "k"? "${text[1]}00"  : text, 
                          style: style, textAlign: TextAlign.center
                        );
                      },
                      showTitles: true,
                      interval: 1,
                      reservedSize: 40,
                    ),
                  ),
                ),

                borderData: ChartTitle.borderData(),
                lineBarsData: [
                  LineChartBarData(
                    isCurved: false,
                    color: Colors.red,
                    barWidth: 3,
                    isStrokeCapRound: true,
                    belowBarData: BarAreaData(show: false),
                    spots: [
                      FlSpot(1, data[data.length - 12].n1!.toDouble()),
                      FlSpot(2, data[data.length - 11].n1!.toDouble()),
                      FlSpot(3, data[data.length - 10].n1!.toDouble()),
                      FlSpot(4, data[data.length - 9].n1!.toDouble()),
                      FlSpot(5, data[data.length - 8].n1!.toDouble()),
                      FlSpot(6, data[data.length - 7].n1!.toDouble()),
                      FlSpot(7, data[data.length - 6].n1!.toDouble()),
                      FlSpot(8, data[data.length - 5].n1!.toDouble()),
                      FlSpot(9, data[data.length - 4].n1!.toDouble()),
                      FlSpot(10,data[data.length - 3].n1!.toDouble()),
                      FlSpot(11,data[data.length - 2].n1!.toDouble()),
                      FlSpot(12,data[data.length - 1].n1!.toDouble()),
                    ],
                  ),
                  LineChartBarData(
                    isCurved: false,
                    color: Colors.blue,
                    barWidth: 3,
                    isStrokeCapRound: true,
                    belowBarData: BarAreaData(
                      show: false,
                      color: const Color(0x00aa4cfc),
                    ),
                    spots: [
                      FlSpot(1, data[data.length - 12].n2!.toDouble()),
                      FlSpot(2, data[data.length - 11].n2!.toDouble()),
                      FlSpot(3, data[data.length - 10].n2!.toDouble()),
                      FlSpot(4, data[data.length - 9].n2!.toDouble()),
                      FlSpot(4, data[data.length - 9].n2!.toDouble()),
                      FlSpot(5, data[data.length - 8].n2!.toDouble()),
                      FlSpot(6, data[data.length - 7].n2!.toDouble()),
                      FlSpot(7, data[data.length - 6].n2!.toDouble()),
                      FlSpot(8, data[data.length - 5].n2!.toDouble()),
                      FlSpot(9, data[data.length - 4].n2!.toDouble()),
                      FlSpot(10, data[data.length - 3].n2!.toDouble()),
                      FlSpot(11, data[data.length - 2].n2!.toDouble()),
                      FlSpot(12, data[data.length - 1].n2!.toDouble()),
                    ],
                  ),
                  LineChartBarData(
                    isCurved: false,
                    color: Colors.green,
                    barWidth: 3,
                    isStrokeCapRound: true,
                    belowBarData: BarAreaData(show: false),
                    spots:
                    [
                      FlSpot(1, data[data.length - 12].n3!.toDouble()),
                      FlSpot(2, data[data.length - 11].n3!.toDouble()),
                      FlSpot(3, data[data.length - 10].n3!.toDouble()),
                      FlSpot(4, data[data.length - 9].n3!.toDouble()),
                      FlSpot(4, data[data.length - 9].n3!.toDouble()),
                      FlSpot(5, data[data.length - 8].n3!.toDouble()),
                      FlSpot(6, data[data.length - 7].n3!.toDouble()),
                      FlSpot(7, data[data.length - 6].n3!.toDouble()),
                      FlSpot(8, data[data.length - 5].n3!.toDouble()),
                      FlSpot(9, data[data.length - 4].n3!.toDouble()),
                      FlSpot(10, data[data.length - 3].n3!.toDouble()),
                      FlSpot(11, data[data.length - 2].n3!.toDouble()),
                      FlSpot(12, data[data.length - 1].n3!.toDouble()),
                    ],
                  ),
                ],
                minX: 0,
                maxX: 13,
                maxY: double.parse(dataY[0].toString()),
                minY: double.parse(dataY[1].toString()),
              )
          )
      );

}