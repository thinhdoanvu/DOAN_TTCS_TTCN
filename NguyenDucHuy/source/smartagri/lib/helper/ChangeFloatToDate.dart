// ignore_for_file: file_names
// ignore_for_file: avoid_print, non_constant_identifier_names

class Changes{

  DateTime changeDoubleToDate(String n){
    const gsDateBase = 2209161600 / 86400;
    const gsDateFactor = 86400000;

    final date = double.tryParse(n.toString());
    final millis = (date! - gsDateBase) * gsDateFactor;
    return DateTime.fromMillisecondsSinceEpoch(millis.toInt(), isUtc: true);
  }

  String getThousand(int n){
    String s= n.toString();
    String s1="";
    // s1 = s.substring(0,s.length-1);
    for (int i=0;i<s.length-1;i++){
      s1 = s1+ s[i];
    }
    return s1;
  }
  String getHundred(int n){
    String s= n.toString();
    String s1="";
    // s1 = s.substring(0,s.length-1);
    s1=s[s.length-1];
    // for (int i=0;i<s.length-1;i++){
    //   s1 = s1+ s[i];
    // }
    return s1;
  }

  int roundDataV2(String n,bool checkMaxMin){
    // checkMaxMin = true => max
    // checkMaxMin = false => min
    double tam = double.parse(n);
    int tamInt ;
    tamInt =  tam.toInt();
    print('tam = $tamInt');

    // print('int = $tamInt');
    int length = tamInt.toString().length ;
    // print('length = $length');
    int s=1;

    for (int i=1; i<length ;i++) {
      s=s*10;
    }
    print('somu = $s');



    // int tamInt = int.parse((tam ~/ s).toString());
    tamInt=tamInt ~/ s;
    // print('Dư: $tamInt');

    int miner = 5 * s ~/10;
    miner = miner + (tamInt)*s;
    print("miner = $miner");

    if (checkMaxMin) {
      // int t= tamint;
      tamInt = (tamInt + 1) * s;

      if ((length >= 3) &&(tam.toInt() < miner))
      {
        tamInt = miner;
      }
    } else {
      tamInt = tamInt * s;
    }
    return tamInt;
  }


  int roundDataV1(String n,bool checkMaxMin){
    // checkMaxMin = true => max
    // checkMaxMin = false => min
    double tam = double.parse(n);
    int tamInt ;
    tamInt =  tam.toInt();
    print('tam = $tamInt');

    int length = tamInt.toString().length;
    int s=1;

    for (int i=1; i<length ;i++) {
      s=s*10;
    }
    print('somu = $s');
    tamInt=tamInt ~/ s;

    int miner = 5 * s ~/10;
    miner = miner + (tamInt)*s;

    if (checkMaxMin) {
      tamInt = (tamInt + 1) * s;

      if ((length >= 4) &&(tam.toInt() < miner))
        {
          tamInt = miner;
        }
    } else {
      tamInt = tamInt * s;
    }
    return tamInt;
  }



  String Div10 (num n){
    double tam = double.parse(n.toString());
    tam=tam/10;
    return tam.toString();
  }



  String Humidity(String n){
    double tam = double.parse(n);
    tam=tam/10;
    return tam.toString();
  }

  String DateChange(String a){
    DateTime? n ;
    n = changeDoubleToDate(a);
    return '${ n.day }/${ n.month<10 ? "0" : "" }${ n.month }/${ n.year }';
  }

  String getTime(String n){
    return '${n[0]}${n[1]}:${n[3]}${n[4]}';
  }

  String getTime12h(String n){
    int hour = int.tryParse('${n[0]}${n[1]}') ?? 0;
    // print("getTime12h time : $hour");
    if (hour > 12) hour = hour - 12;
    return '${hour<10? "0$hour" :"$hour" }:${n[3]}${n[4]}';
  }

  String getAMPM(String n){
    int h1 = int.tryParse(n[0]) ?? 0;
    int h2 = int.tryParse(n[1]) ?? 0;
    int h=h1*10 + h2;
    if(h>12 &&h<24) {
      return 'PM';
    } else {
      return 'AM';
    }
  }

  String getIcon(String n){
    int h1 = int.parse(n[0]);
    int h2 = int.parse(n[1]);
    int h=h1*10 + h2;
    if(h>=6 &&h<=18) {
      return 'AM';
    } else {
      return 'PM';
    }
  }

  
}