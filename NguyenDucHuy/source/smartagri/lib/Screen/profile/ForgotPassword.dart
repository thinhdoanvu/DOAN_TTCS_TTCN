// ignore_for_file: file_names, avoid_print, non_constant_identifier_names

import 'dart:async';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/helper/dialogLoading.dart';

class ForgotPasswordScreen extends StatefulWidget {
  const ForgotPasswordScreen({super.key});

  @override
  State<ForgotPasswordScreen> createState() => _ForgotPasswordScreenState();
}

class _ForgotPasswordScreenState extends State<ForgotPasswordScreen> {


  TextEditingController txtEmail = TextEditingController();


  Future<void> touchConfirm() async {

    FocusScope.of(context).requestFocus(FocusNode());

    diaLogLoading(context, true);

    try{
      await FirebaseAuth.instance.sendPasswordResetEmail(email: txtEmail.text.toString().trim())
      .then((value) {
        Timer(const Duration(seconds: 2),(){
          Navigator.pop(context);
          AwesomeDialog(
            context: context,
            dialogType: DialogType.success,
            animType: AnimType.scale,
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
          title: "Warning",
          desc: "Incorrect email",
          btnCancelOnPress: (){}
        ).show();
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        body: GestureDetector(
          onTap: () {
            print('close keyboard');
            FocusScope.of(context).requestFocus(FocusNode());
          },
          child: Container(
            decoration: const  BoxDecoration(
              color: Colors.white
            ),
            child: Column(
              children: [
                Header(),

                Expanded(
                  flex: 1,
                  child: Center(
                    child: SingleChildScrollView(
                      child: Padding(
                        padding: const EdgeInsets.only(bottom: 100),
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          crossAxisAlignment: CrossAxisAlignment.center,
                          children: [
                            Image.asset("assets/images/resetpass.jpg", 
                              width: MediaQuery.of(context).size.width*2/3,
                              height: MediaQuery.of(context).size.width*2/3,
                            ),
                    
                            TitleScreen(),
                    
                            FormInput()
                          ],
                        ),
                      ),
                    ),
                  )
                )
              ],
            ),
          )
        ),
      ),
    );
  }

  Widget Header()=> Padding(
    padding: const EdgeInsets.only(top: 30, left: 35, right: 20),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        GestureDetector(
          onTap: (){
            Navigator.of(context).pop();
          },
          child: const Icon(Icons.keyboard_backspace_rounded, size: 40, color: Colors.blue,)
        ),
      ],
    ),
  );

  Widget TitleScreen()=>Padding(
    padding: const EdgeInsets.only(),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.center,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children:const  [
            Text("Forgot password ", style: TextStyle(color: Color.fromRGBO(33, 150, 243, 1), fontWeight: FontWeight.bold, fontSize: 24),),
            SizedBox(height: 10),

            Text("Enter your email to get your password", style: TextStyle(color: Colors.blue, fontSize: 17),)
          ],
        ),
      ],
    ),
  );

  Widget FormInput() => Column(
    children: [
      Padding(
        padding: const EdgeInsets.only(top: 30, left: 40, right: 40, bottom: 30),
        child: TextField(
          decoration: InputDecoration(
            labelText: "Email",
            fillColor: Colors.grey[100],
            filled: true,
            errorText: txtEmail.text.toString() != "" && !txtEmail.text.toString().contains("@")
              ? "Please enter a valid email ..."
              : null,
            focusedBorder: OutlineInputBorder(
              borderRadius: BorderRadius.circular(300),
              borderSide: const BorderSide(color: Colors.blue, width:  1.75 )
            ),
            border: OutlineInputBorder(
              borderRadius: BorderRadius.circular(300),
            )  
          ),
          controller:  txtEmail,
        ),
      ), const SizedBox(height: 20,),

      Row(
        mainAxisAlignment: MainAxisAlignment.end,
        children: [
          GestureDetector(
            onTap: touchConfirm,
            child: Container(
              decoration: BoxDecoration(
                color: Colors.blue,
                borderRadius: BorderRadius.circular(300)
              ),
              child: const Padding(
                padding: EdgeInsets.only(left: 30, right: 30, top: 12, bottom: 12 ),
                child: Text('Confirm', style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 18),),
              ),
            ),
          ),
          
          const SizedBox(width: 30,)
        ],
      )
    ],
  );
}