// ignore_for_file: file_names
// ignore_for_file: constant_identifier_names, non_constant_identifier_names

class DataSendSetFields{
  static const String date = 'date';
  static const String time = 'time';

  static const String humidity1 = 'humidity1';
  static const String temperature1 = 'temperature1';
  static const String light1 = 'light1';
  static const String humidity2 = 'humidity2';
  static const String temperature2 = 'temperature2';
  static const String light2 = 'light2';
  static const String humidity3 = 'humidity3';
  static const String temperature3 = 'temperature3';
  static const String light3 = 'light3';

  static const String DA_A1_MIN= 'DA_A1_MIN';
  static const String DA_A1_MAX= 'DA_A1_MAX';
  static const String DA_A2_MIN= 'DA_A2_MIN';
  static const String DA_A2_MAX= 'DA_A2_MAX';
  static const String DA_A3_MIN= 'DA_A3_MIN';
  static const String DA_A3_MAX= 'DA_A3_MAX';

  static const String ND_A1_MIN= 'ND_A1_MIN';
  static const String ND_A1_MAX= 'ND_A1_MAX';
  static const String ND_A2_MIN= 'ND_A2_MIN';
  static const String ND_A2_MAX= 'ND_A2_MAX';
  static const String ND_A3_MIN= 'ND_A3_MIN';
  static const String ND_A3_MAX= 'ND_A3_MAX';

  static const String AS_A1_MIN= 'AS_A1_MIN';
  static const String AS_A1_MAX= 'AS_A1_MAX';
  static const String AS_A2_MIN= 'AS_A2_MIN';
  static const String AS_A2_MAX= 'AS_A2_MAX';
  static const String AS_A3_MIN= 'AS_A3_MIN';
  static const String AS_A3_MAX= 'AS_A3_MAX';

  static const String TIME_OFF= 'TIME_OFF';
  static const String TIME_ON= 'TIME_ON';

  static const String TIME_BN1= 'TIME_BN1';
  static const String TIME_BN2= 'TIME_BN2';
  static const String TIME_BN3= 'TIME_BN3';
  static const String TIME_PS1= 'TIME_PS1';
  static const String TIME_PS2= 'TIME_PS2';
  static const String TIME_PS3= 'TIME_PS3';
  static const String TIME_AS1= 'TIME_AS1';
  static const String TIME_AS2= 'TIME_AS2';
  static const String TIME_AS3= 'TIME_AS3';



  static List<String> getSendFields()=>[date, time, DA_A1_MIN,	DA_A1_MAX,	DA_A2_MIN,	DA_A2_MAX,	DA_A3_MIN,	DA_A3_MAX,	ND_A1_MIN,	ND_A1_MAX,	ND_A2_MIN,	ND_A2_MAX,	ND_A3_MIN,	ND_A3_MAX,	AS_A1_MIN,	AS_A1_MAX,	AS_A2_MIN,	AS_A2_MAX,	AS_A3_MIN,	AS_A3_MAX,	TIME_OFF,	TIME_ON,	TIME_BN1,	TIME_BN2,	TIME_BN3,	TIME_PS1,	TIME_PS2,	TIME_PS3,	TIME_AS1,	TIME_AS2,	TIME_AS3];
}

class DataSendSet{
  final String? date ;
  final String? time ;

  final num? DA_A1_MIN ;
  final num? DA_A1_MAX ;
  final num? DA_A2_MIN ;
  final num? DA_A2_MAX ;
  final num? DA_A3_MIN ;
  final num? DA_A3_MAX ;

  final num? ND_A1_MIN ;
  final num? ND_A1_MAX ;
  final num? ND_A2_MIN ;
  final num? ND_A2_MAX ;
  final num? ND_A3_MIN ;
  final num? ND_A3_MAX ;

  final num? AS_A1_MIN ;
  final num? AS_A1_MAX ;
  final num? AS_A2_MIN ;
  final num? AS_A2_MAX ;
  final num? AS_A3_MIN ;
  final num? AS_A3_MAX ;

  final num? TIME_OFF ;
  final num? TIME_ON ;

  final num? TIME_BN1 ;
  final num? TIME_BN2 ;
  final num? TIME_BN3 ;
  final num? TIME_PS1 ;
  final num? TIME_PS2 ;
  final num? TIME_PS3 ;
  final num? TIME_AS1 ;
  final num? TIME_AS2 ;
  final num? TIME_AS3 ;

  const DataSendSet(
      {
        required this.date,
        required this.time,

        required this.DA_A1_MIN ,
        required this.DA_A1_MAX ,
        required this.DA_A2_MIN ,
        required this.DA_A2_MAX ,
        required this.DA_A3_MIN ,
        required this.DA_A3_MAX ,

        required this.ND_A1_MIN ,
        required this.ND_A1_MAX ,
        required this.ND_A2_MIN ,
        required this.ND_A2_MAX ,
        required this.ND_A3_MIN ,
        required this.ND_A3_MAX ,

        required this.AS_A1_MIN ,
        required this.AS_A1_MAX ,
        required this.AS_A2_MIN ,
        required this.AS_A2_MAX ,
        required this.AS_A3_MIN ,
        required this.AS_A3_MAX ,

        required this.TIME_OFF ,
        required this.TIME_ON ,

        required this.TIME_BN1 ,
        required this.TIME_BN2 ,
        required this.TIME_BN3 ,
        required this.TIME_PS1 ,
        required this.TIME_PS2 ,
        required this.TIME_PS3 ,
        required this.TIME_AS1 ,
        required this.TIME_AS2 ,
        required this.TIME_AS3 ,
      });

  DataSendSet copy({
    String? date ,
    String? time ,

    num? DA_A1_MIN ,
    num? DA_A1_MAX ,
    num? DA_A2_MIN ,
    num? DA_A2_MAX ,
    num? DA_A3_MIN ,
    num? DA_A3_MAX ,

    num? ND_A1_MIN ,
    num? ND_A1_MAX ,
    num? ND_A2_MIN ,
    num? ND_A2_MAX ,
    num? ND_A3_MIN ,
    num? ND_A3_MAX ,

    num? AS_A1_MIN ,
    num? AS_A1_MAX ,
    num? AS_A2_MIN ,
    num? AS_A2_MAX ,
    num? AS_A3_MIN ,
    num? AS_A3_MAX ,

    num? TIME_OFF ,
    num? TIME_ON ,

    num? TIME_BN1 ,
    num? TIME_BN2 ,
    num? TIME_BN3 ,
    num? TIME_PS1 ,
    num? TIME_PS2 ,
    num? TIME_PS3 ,
    num? TIME_AS1 ,
    num? TIME_AS2 ,
    num? TIME_AS3 ,
  })=> DataSendSet(
    date: date?? this.date,
    time: time?? this.time,

    DA_A1_MIN :  DA_A1_MIN?? this.DA_A1_MIN   ,
    DA_A1_MAX :  DA_A1_MAX?? this.DA_A1_MAX   ,
    DA_A2_MIN :  DA_A2_MIN?? this.DA_A2_MIN   ,
    DA_A2_MAX :  DA_A2_MAX?? this.DA_A2_MAX   ,
    DA_A3_MIN :  DA_A3_MIN?? this.DA_A3_MIN   ,
    DA_A3_MAX :  DA_A3_MAX?? this.DA_A3_MAX   ,

    ND_A1_MIN :  ND_A1_MIN?? this.ND_A1_MIN   ,
    ND_A1_MAX :  ND_A1_MAX?? this.ND_A1_MAX   ,
    ND_A2_MIN :  ND_A2_MIN?? this.ND_A2_MIN   ,
    ND_A2_MAX :  ND_A2_MAX?? this.ND_A2_MAX   ,
    ND_A3_MIN :  ND_A3_MIN?? this.ND_A3_MIN   ,
    ND_A3_MAX :  ND_A3_MAX?? this.ND_A3_MAX   ,

    AS_A1_MIN :  AS_A1_MIN?? this.AS_A1_MIN   ,
    AS_A1_MAX :  AS_A1_MAX?? this.AS_A1_MAX   ,
    AS_A2_MIN :  AS_A2_MIN?? this.AS_A2_MIN   ,
    AS_A2_MAX :  AS_A2_MAX?? this.AS_A2_MAX   ,
    AS_A3_MIN :  AS_A3_MIN?? this.AS_A3_MIN   ,
    AS_A3_MAX :  AS_A3_MAX?? this.AS_A3_MAX   ,

    TIME_OFF :  TIME_OFF?? this.TIME_OFF   ,
    TIME_ON :  TIME_ON?? this.TIME_ON   ,

    TIME_BN1 :  TIME_BN1?? this.TIME_BN1   ,
    TIME_BN2 :  TIME_BN2?? this.TIME_BN2   ,
    TIME_BN3 :  TIME_BN3?? this.TIME_BN3   ,
    TIME_PS1 :  TIME_PS1?? this.TIME_PS1   ,
    TIME_PS2 :  TIME_PS2?? this.TIME_PS2   ,
    TIME_PS3 :  TIME_PS3?? this.TIME_PS3   ,
    TIME_AS1 :  TIME_AS1?? this.TIME_AS1   ,
    TIME_AS2 :  TIME_AS2?? this.TIME_AS2   ,
    TIME_AS3 :  TIME_AS3?? this.TIME_AS3   ,
  );

  static DataSendSet fromJson(Map<String,dynamic> json) =>
      DataSendSet(
        date: json[DataSendSetFields.date.toString()],
        time: json[DataSendSetFields.time.toString()],

        DA_A1_MIN  : double.tryParse(json[DataSendSetFields.DA_A1_MIN.toString()]),
        DA_A1_MAX  : double.tryParse(json[DataSendSetFields.DA_A1_MAX.toString()]),
        DA_A2_MIN  : double.tryParse(json[DataSendSetFields.DA_A2_MIN.toString()]),
        DA_A2_MAX  : double.tryParse(json[DataSendSetFields.DA_A2_MAX.toString()])   ,
        DA_A3_MIN  : double.tryParse(json[DataSendSetFields.DA_A3_MIN.toString()]),
        DA_A3_MAX  : double.tryParse(json[DataSendSetFields.DA_A3_MAX.toString()]),

        ND_A1_MIN  : double.tryParse(json[DataSendSetFields.ND_A1_MIN.toString()]),
        ND_A1_MAX  : double.tryParse(json[DataSendSetFields.ND_A1_MAX.toString()]),
        ND_A2_MIN  : double.tryParse(json[DataSendSetFields.ND_A2_MIN.toString()]),
        ND_A2_MAX  : double.tryParse(json[DataSendSetFields.ND_A2_MAX.toString()]),
        ND_A3_MIN  : double.tryParse(json[DataSendSetFields.ND_A3_MIN.toString()]),
        ND_A3_MAX  : double.tryParse(json[DataSendSetFields.ND_A3_MAX.toString()]),

        AS_A1_MIN  : double.tryParse(json[DataSendSetFields.AS_A1_MIN.toString()]),
        AS_A1_MAX  : double.tryParse(json[DataSendSetFields.AS_A1_MAX.toString()]),
        AS_A2_MIN  : double.tryParse(json[DataSendSetFields.AS_A2_MIN.toString()]),
        AS_A2_MAX  : double.tryParse(json[DataSendSetFields.AS_A2_MAX.toString()]),
        AS_A3_MIN  : double.tryParse(json[DataSendSetFields.AS_A3_MIN.toString()]),
        AS_A3_MAX  : double.tryParse(json[DataSendSetFields.AS_A3_MAX.toString()]),

        TIME_OFF  : double.tryParse(json[DataSendSetFields.TIME_OFF.toString()]),
        TIME_ON  : double.tryParse(json[DataSendSetFields.TIME_ON.toString()]),

        TIME_BN1  : double.tryParse(json[DataSendSetFields.TIME_BN1.toString()]),
        TIME_BN2  : double.tryParse(json[DataSendSetFields.TIME_BN2.toString()]),
        TIME_BN3  : double.tryParse(json[DataSendSetFields.TIME_BN3.toString()]),
        TIME_PS1  : double.tryParse(json[DataSendSetFields.TIME_PS1.toString()]),
        TIME_PS2  : double.tryParse(json[DataSendSetFields.TIME_PS2.toString()]),
        TIME_PS3  : double.tryParse(json[DataSendSetFields.TIME_PS3.toString()]),
        TIME_AS1  : double.tryParse(json[DataSendSetFields.TIME_AS1.toString()]),
        TIME_AS2  : double.tryParse(json[DataSendSetFields.TIME_AS2.toString()]),
        TIME_AS3  : double.tryParse(json[DataSendSetFields.TIME_AS3.toString()]),
      );

  Map<String, dynamic> toJson()=>{
    DataSendSetFields.date: date.toString(),
    DataSendSetFields.time: time.toString(),

    DataSendSetFields.DA_A1_MIN  : DA_A1_MIN.toString(),
    DataSendSetFields.DA_A1_MAX  : DA_A1_MAX.toString(),
    DataSendSetFields.DA_A2_MIN  : DA_A2_MIN.toString(),
    DataSendSetFields.DA_A2_MAX  : DA_A2_MAX.toString()   ,

    DataSendSetFields.DA_A3_MIN  : DA_A3_MIN.toString(),
    DataSendSetFields.DA_A3_MAX  : DA_A3_MAX.toString(),

    DataSendSetFields.ND_A1_MIN  : ND_A1_MIN.toString(),
    DataSendSetFields.ND_A1_MAX  : ND_A1_MAX.toString(),
    DataSendSetFields.ND_A2_MIN  : ND_A2_MIN.toString(),
    DataSendSetFields.ND_A2_MAX  : ND_A2_MAX.toString(),
    DataSendSetFields.ND_A3_MIN  : ND_A3_MIN.toString(),
    DataSendSetFields.ND_A3_MAX  : ND_A3_MAX.toString(),

    DataSendSetFields.AS_A1_MIN  : AS_A1_MIN.toString(),
    DataSendSetFields.AS_A1_MAX  : AS_A1_MAX.toString(),
    DataSendSetFields.AS_A2_MIN  : AS_A2_MIN.toString(),
    DataSendSetFields.AS_A2_MAX  : AS_A2_MAX.toString(),
    DataSendSetFields.AS_A3_MIN  : AS_A3_MIN.toString(),
    DataSendSetFields.AS_A3_MAX  : AS_A3_MAX.toString(),

    DataSendSetFields.TIME_OFF  : TIME_OFF.toString(),
    DataSendSetFields.TIME_ON  : TIME_ON.toString(),

    DataSendSetFields.TIME_BN1  : TIME_BN1.toString(),
    DataSendSetFields.TIME_BN2  : TIME_BN2.toString(),
    DataSendSetFields.TIME_BN3  : TIME_BN3.toString(),
    DataSendSetFields.TIME_PS1  : TIME_PS1.toString(),
    DataSendSetFields.TIME_PS2  : TIME_PS2.toString(),
    DataSendSetFields.TIME_PS3  : TIME_PS3.toString(),
    DataSendSetFields.TIME_AS1  : TIME_AS1.toString(),
    DataSendSetFields.TIME_AS2  : TIME_AS2.toString(),
    DataSendSetFields.TIME_AS3  : TIME_AS3.toString(),
  };
}