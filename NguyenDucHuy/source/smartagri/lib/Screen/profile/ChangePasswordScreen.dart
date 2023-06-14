// ignore_for_file: file_names, avoid_print, non_constant_identifier_names

import 'dart:async';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/helper/dialogLoading.dart';

class ChangePasswordScreen extends StatefulWidget {
  const ChangePasswordScreen({super.key});

  @override
  State<ChangePasswordScreen> createState() => _ChangePasswordScreenState();
}

class _ChangePasswordScreenState extends State<ChangePasswordScreen> {

  TextEditingController txtCurrentEmail= TextEditingController();
  
  FocusNode currentPasswordNode = FocusNode();
  FocusNode newPasswordNode = FocusNode();
  FocusNode newPasswordConfirmNode = FocusNode();


  Future<void> touchConfirm() async {

    FocusScope.of(context).requestFocus(FocusNode());

    diaLogLoading(context, true);

    if (txtCurrentEmail.text.toString().trim() == FirebaseAuth.instance.currentUser!.email){
      try{
      await FirebaseAuth.instance.sendPasswordResetEmail(email: FirebaseAuth.instance.currentUser!.email!)
      .then((value) {
        Timer(const Duration(seconds: 2),(){
          Navigator.pop(context);
          AwesomeDialog(
            context: context,
            dialogType: DialogType.success,
            animType: AnimType.scale,
            // showCloseIcon: true,
            title: "Success",
            desc: "Please check your email",
            btnOkOnPress: (){
              Navigator.of(context).pop();
            }
          ).show();
        });
      });
    }catch (e){
      print(e);
      Timer(const Duration(seconds:2),(){
        Navigator.pop(context);
        AwesomeDialog(
          context: context,
          dialogType: DialogType.error,
          animType: AnimType.scale,
          // showCloseIcon: true,
          title: "Warning",
          desc: "Incorrect email",
          btnCancelOnPress: (){
            // Navigator.of(context).pop();
          }
        ).show();
      });
    }
    }else{
      Navigator.pop(context);
      AwesomeDialog(
        context: context,
        dialogType: DialogType.error,
        animType: AnimType.scale,
        // showCloseIcon: true,
        title: "Warning",
        desc: "Incorrect email",
        btnCancelOnPress: (){
          // Navigator.of(context).pop();
        }
      ).show();
    }
  }

  String fullName = " ... ";


  Future<void> getProfileUser () async {
    try{
      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      await users
      // .doc(FirebaseAuth.instance.currentUser!.uid)
        .get()
        .then((QuerySnapshot querySnapshot) {
          for (var doc in querySnapshot.docs) {
            if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid && FirebaseAuth.instance.currentUser  != null)
            {
              //  Get User  
              print(doc["FullName"]);
              setState(() {
                fullName = doc["FullName"];
              });
            }
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


  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        body: GestureDetector(
          onTap: () {
            FocusScope.of(context).requestFocus(FocusNode());
          },
          // ignore: avoid_unnecessary_containers
          child: Container(
            child: SingleChildScrollView(
              child: Column(
                children: <Widget>[
                  Header(),

                  BodyChangePassword(),

                ],
              ),
            ),
          ),
        ),
      )
    );
  }

  Widget Header()=> Padding(
    padding: const EdgeInsets.only(bottom: 16, top: 20, left: 20, right: 20),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        GestureDetector(
          onTap: (){
            Navigator.of(context).pop();
          },
          child: const Icon(Icons.keyboard_backspace_rounded, size: 40, color: Colors.deepPurpleAccent,)
        ),

        // Padding(
        //   padding: const EdgeInsets.only( top: 20, bottom: 20),
        //   child: Text("Change Password", style: TextStyle(fontSize: 25, fontWeight: FontWeight.bold, color: Colors.black),),
        // ),

        // Text('    ')
      ],
    ),
  );

  Widget BodyChangePassword() => Column(
    children: [
      TitleScreen(),

      FormInput(),

      // ForgotPassword(),

      ButtonSave()
    ],
  );

  Widget TitleScreen () => Padding(
    padding: const EdgeInsets.only(left: 20),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Row(
              children: [
                fullName == ""
                  ?  const Padding(
                    padding: EdgeInsets.only(left: 20),
                    child: Icon(Icons.email_rounded, size: 30, color: Colors.deepPurpleAccent ,),
                  )
                  :   Text(fullName, style: const TextStyle(color: Colors.deepPurpleAccent, fontWeight: FontWeight.bold, fontSize: 16),),
                const Text(" • ", style: TextStyle(color: Colors.black, fontWeight: FontWeight.w900, fontSize: 22),),
                const Text("NTU SmartAgri", style: TextStyle(color: Colors.black, fontWeight: FontWeight.w500, fontSize: 16),),
              ],
            ), const SizedBox(height: 8,),

            const Text("Change Password", style: TextStyle(color: Colors.black, fontWeight: FontWeight.bold, fontSize: 22),),
            const SizedBox(height: 16,),

            SizedBox(
              width: MediaQuery.of(context).size.width - 40,
              child:const Text("Please enter your email to change password.", 
              style: TextStyle(color: Colors.black, fontWeight: FontWeight.w300, fontSize: 17),)
            ),
          ],
        ),
      ],
    ),
  );


  Widget FormInput()=> Padding(
    padding: const EdgeInsets.only(left: 30, right: 40, top: 20),
    child: Column(
      children: [
        //  ------------- CURRENT EMAIL ---------------------
        TextField(
          decoration: InputDecoration(
            labelText: " Email",
            focusedBorder: OutlineInputBorder(
              borderRadius: BorderRadius.circular(100),
              borderSide: const BorderSide(color: Colors.blue, width:  1.75 )
            ),
            border: OutlineInputBorder(
              borderRadius: BorderRadius.circular(100),
            )  
          ),
          controller:  txtCurrentEmail,
          onChanged: (value) {
            // setState(() {
            //   txtCurrentPassword.text = value ;
            // });
          },
        ), const SizedBox(height: 20,),

        
      ],
    ),
  );

  Widget ButtonSave()=>Padding(
    padding: const EdgeInsets.only(left: 20, top: 0,right: 40),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.end,
      crossAxisAlignment: CrossAxisAlignment.end,
      children: [
        GestureDetector(
          onTap: touchConfirm,
          child: Container(
            decoration: BoxDecoration(
              color: Colors.deepPurpleAccent,
              borderRadius: BorderRadius.circular(100)
            ),
            child: const Padding(
              padding: EdgeInsets.only(left: 30, right: 30, top: 12, bottom: 12 ),
              child: Text("Confirm", style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 20),),
            )
          ),
        )
      ],
    ),
  );
}