// ignore_for_file: file_names, non_constant_identifier_names, avoid_print

import 'dart:async';

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:open_mail_app/open_mail_app.dart';
import 'package:url_launcher/url_launcher.dart';

class AboutDeveloper extends StatefulWidget {
  const AboutDeveloper({super.key});

  @override
  State<AboutDeveloper> createState() => _AboutDeveloperState();
}

class _AboutDeveloperState extends State<AboutDeveloper> {

  String email = "";
  String phoneNumber = "";
  String facebookName = "";
  String facebookUrl = "";
  String lineName = "";
  String lineUrl = "";


  String chuanHoaPhoneNumber(String tam ){
    try{
      tam = tam.replaceAll(" ", "");
      var tam1 = "${tam.substring(0,3)} ${tam.substring(3,7)} ${tam.substring(7, tam.length)}" ;
      print(" tam1 $tam1");
      return tam1;
    }catch (error){
      return tam;
    }
  }

  Future<void> getProfileUser () async {
    try{

      CollectionReference users = FirebaseFirestore.instance.collection('TblContactUs');

      await users
        .get()
        .then((QuerySnapshot querySnapshot) {
          for (var doc in querySnapshot.docs) {
            setState(() {
              email = doc["Email"].toString().trim();
              phoneNumber = chuanHoaPhoneNumber(doc["Phone"].toString());
              facebookName = doc["FacebookName"];
              facebookUrl = doc["FacebookUrl"];
              lineName = doc["LineName"];
              lineUrl = doc["LineUrl"];
            });
            break;
          }
          
      });
    }catch (error){
      print(error.toString());
    }
    
  }
  @override
  void initState() {
    super.initState();
    getProfileUser();
  }

  void copyToClipBoard (String title){
    Clipboard.setData(ClipboardData(text: title))
    .then((value) {
      Fluttertoast.showToast(
        msg: "Copied to Clipboard",
        toastLength: Toast.LENGTH_SHORT, gravity: ToastGravity.BOTTOM, 
        timeInSecForIosWeb: 1,
        textColor: Colors.white, fontSize: 16.0
      );
    });
  }


  Future<void> openEmail(String emailTo ) async {
      EmailContent email = EmailContent(
        to: [ emailTo ,],
        subject: 'Help Smart Agri',
        body: '',
      );

      OpenMailAppResult result =
          await OpenMailApp.composeNewEmailInMailApp(
              nativePickerTitle: 'Select email app to compose',
              emailContent: email);
      if (!result.didOpen && !result.canOpen) {
        Fluttertoast.showToast(
          msg: "Can't launch Email App",
          toastLength: Toast.LENGTH_SHORT, gravity: ToastGravity.BOTTOM, 
          timeInSecForIosWeb: 1,
          textColor: Colors.white, fontSize: 16.0
        );
      } else if (!result.didOpen && result.canOpen) {
        showDialog(
          context: context,
          builder: (_) => MailAppPickerDialog(
            mailApps: result.options,
            emailContent: email,
          ),
        );
      }
  }

  Future<void> openFacebook( String linkFacebook) async {
    Uri toLaunch = Uri.parse( linkFacebook);
    if (!await launchUrl(
      toLaunch,
      mode: LaunchMode.externalApplication,
    )) {
      Fluttertoast.showToast(
        msg: "Can't launch Facebook",
        toastLength: Toast.LENGTH_SHORT, gravity: ToastGravity.BOTTOM, 
        timeInSecForIosWeb: 1,
        textColor: Colors.white, fontSize: 16.0
      );
    }
  }

  Future<void> openLine( String linkLine) async {
    Uri toLaunch = Uri.parse( linkLine );
    if (!await launchUrl(
      toLaunch,
      mode: LaunchMode.externalApplication,
    )) {
      Fluttertoast.showToast(
          msg: "Can't launch Line",
          toastLength: Toast.LENGTH_SHORT, gravity: ToastGravity.BOTTOM, 
          timeInSecForIosWeb: 1,
          textColor: Colors.white, fontSize: 16.0
        );
    }
  }

  Future<void> openPhoneNumber( String phoneNumber) async {
    final Uri launchUri = Uri(
      scheme: 'tel',
      path: phoneNumber,
    ); 
    if (await canLaunchUrl(launchUri)) {
      await launchUrl(launchUri);
    } else {
      Fluttertoast.showToast(
        msg: "Can't launch Phone app",
        toastLength: Toast.LENGTH_SHORT, gravity: ToastGravity.BOTTOM, 
        timeInSecForIosWeb: 1,
        textColor: Colors.white, fontSize: 16.0
      );
    }   
  }


  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: SingleChildScrollView(
        child: Container(
          width: MediaQuery.of(context).size.width,
          height: MediaQuery.of(context).size.height,
          decoration:  const BoxDecoration(
            color: Colors.white
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              HeaderScreen(),
              BodyScreen(),
            ],
          ),
        ),
      ),
    );
  }

  Widget HeaderScreen() => Padding(
    padding: const EdgeInsets.only(top: 16),
    child: Container(
      height: MediaQuery.of(context).size.height * 3 / 8,
      width: MediaQuery.of(context).size.width,
      decoration: const BoxDecoration(
        image: DecorationImage(
          image: AssetImage("assets/images/contact_us_v3.jpg"),
          fit: BoxFit.contain
        )
      ),
      child: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          mainAxisAlignment: MainAxisAlignment.start,
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              crossAxisAlignment: CrossAxisAlignment.center,
              children: [
                GestureDetector(
                  onTap: (){
                    Navigator.of(context).pop();
                  },
                  child: const Icon(Icons.keyboard_backspace_rounded, size: 40, color: Colors.deepPurpleAccent)
                ),

                const Padding(
                    padding: EdgeInsets.only( top: 0, bottom: 0),
                    child: Text("Contact Us", 
                      style: TextStyle(
                        fontSize: 25, 
                        fontWeight: FontWeight.bold, 
                        color: Colors.deepPurpleAccent,
                        decoration: TextDecoration.underline,
                      ),
                    ),
                  ),

                const Text('          ')
              ],
            ),
          ],
        ),
      ),
    ),
  );

  Widget BodyScreen()=>Container(
    width: MediaQuery.of(context).size.width,
    decoration: const BoxDecoration(
      color: Colors.white,
      borderRadius: BorderRadius.only(
        topLeft: Radius.circular(50),
        topRight: Radius.circular(50),
      )
    ),
    child: Column(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        // ------------------------- Email -------------------------
        GestureDetector(
          onLongPress: ()=>  copyToClipBoard(email) ,
          onTap: ()=> openEmail(email),
          child: ItemContact("assets/images/email.jpg", "Email",email)),

        // ------------------------- Phone Number -------------------------
        GestureDetector(
          onTap: ()=> openPhoneNumber(phoneNumber),
          onLongPress: ()=>  copyToClipBoard(phoneNumber) ,
          child: ItemContact("assets/images/phone.png", "Phone",phoneNumber)),

        // ------------------------- FaceBook -------------------------
        GestureDetector(
          onTap: ()=> openFacebook(facebookUrl),
          onLongPress: ()=>  copyToClipBoard(facebookUrl) ,
          child: ItemContact("assets/images/facebook.jpg", "Facebook",facebookName)),

        // ------------------------- LINE -------------------------
        GestureDetector(
          onTap: ()=> openLine(lineUrl),
          onLongPress: ()=>  copyToClipBoard(lineUrl) ,
          child: ItemContact("assets/images/line.png", "Line",lineName))
      ],
    ),
  );

  Widget ItemContact (String fileAsset, String titleItem, String detailItem) => Padding(
    padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 8),
    child: Container(
      padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 7),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(20),
        boxShadow: [
          BoxShadow(
            color: Colors.grey.withOpacity(0.3),
            spreadRadius: 5,
            blurRadius: 7,
            offset: const Offset(0, 3),
          ),
        ],
      ),
      child: Row(
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Container(     
            decoration: BoxDecoration(
              borderRadius: BorderRadius.circular(1000),
              color: Colors.white,
            ),
            child: ClipRRect(borderRadius: BorderRadius.circular(1000), 
              child: Padding(
                padding: const EdgeInsets.all(8.0),
                child: Image.asset(fileAsset, width: 60, height: 60, fit: BoxFit.cover, ),
              ))
          ),

          Padding(
            padding: const EdgeInsets.only(left: 10),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(titleItem, style: const TextStyle(fontWeight: FontWeight.w700, fontSize: 20, color: Colors.black),),
                const SizedBox(height: 5,),
                Text(detailItem,style: const TextStyle(fontWeight: FontWeight.w400, fontSize: 16, color: Colors.black),)
              ],
            ),
          )
        ],
      ),
    ),
  );

}