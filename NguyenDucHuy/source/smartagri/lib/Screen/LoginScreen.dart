// ignore_for_file: file_names, avoid_print, use_build_context_synchronously

import 'dart:async';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/ManagerScreen.dart';
import 'package:smartagri/Screen/profile/ForgotPassword.dart';
import 'package:smartagri/helper/dialogLoading.dart';

import '../data/data_sheet_api.dart';

class LoginScreen extends StatefulWidget {
  const LoginScreen({Key? key}) : super(key: key);

  @override
  State<LoginScreen> createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {

  TextEditingController txtEmail = TextEditingController();
  TextEditingController txtPassword = TextEditingController();

  @override
  void initState() {
    super.initState();
    // checkInternet();
  }

  bool isShowPass = true;


  void dialogError(){
    AwesomeDialog(
        context: context,
        dialogType: DialogType.error,
        animType: AnimType.scale,
        // showCloseIcon: true,
        title: "Warning",
        desc: "Incorrect email or password",
        btnCancelOnPress: (){}
      ).show();
  }

  Future<void> touchSignIn() async {
      diaLogLoading(context,true);

      try{
        await FirebaseAuth.instance.signInWithEmailAndPassword(
          email: txtEmail.text.toString().trim(), 
          password: txtPassword.text.toString().trim()
        ).then((value) async {
          


          String currentUser  = "";
          CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

          await users
          // .doc(FirebaseAuth.instance.currentUser!.uid)
            .get()
            .then((QuerySnapshot querySnapshot) {
              for (var doc in querySnapshot.docs) {
                if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
                {
                  currentUser = doc["GGSheet"];
                }
              }
          });
          
          
          await DataSheetApi.init(currentUser).whenComplete(() {
            print('Init Success');
            
          });

          await FirebaseAuth.instance.currentUser!.updateDisplayName(currentUser);

          Navigator.pop(context);

          Navigator.pushAndRemoveUntil(context,
            MaterialPageRoute(builder: (_) => const ManagerScreen()), (route) => false
          );

          print(" ===============  Login Success ================= $value");
        });
      }catch(e){
        Timer(const Duration(seconds: 2), (){
          try {Navigator.pop(context);}
          catch (e){ print(e);}
          dialogError();
        });
        print("error login try catch $e");
          
      }
  }

  @override
  Widget build(BuildContext context) {
    return Material(
      child: Scaffold(
          backgroundColor: Colors.grey[200],
          resizeToAvoidBottomInset: true,
          body: GestureDetector(
            onTap: () {
              FocusScope.of(context).requestFocus(FocusNode());
            },
            child: Center(
              // child: ManagerScreen
              child: SingleChildScrollView(
                child: SafeArea(
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      //Hello
                      // Icon(Icons.admin_panel_settings ,
                      //   size: 100,),
                      Container(
                        decoration: BoxDecoration(
                          borderRadius: BorderRadius.circular(1000),
                          boxShadow: [
                            BoxShadow(
                              color: Colors.grey.withOpacity(0.5),
                              spreadRadius: 5,
                              blurRadius: 7,
                              offset: const Offset(0, 3),
                            ),
                          ],
                        ),
                        child: Image.asset('assets/images/smartAgri.png',
                            width: MediaQuery.of(context).size.width *5/10,
                            height: MediaQuery.of(context).size.width *5/10,
                            fit: BoxFit.fill
                        ),
                      ),
          
                      const SizedBox(height: 25,),
          
                      const Text('NTU Smart Agri',style: TextStyle(
                          fontWeight: FontWeight.bold,fontSize: 30),),
          
                      const SizedBox(height: 10,),
          
                      const SizedBox(height: 25,),
                      Padding(
                        padding: const EdgeInsets.symmetric(horizontal: 25),
                        child: TextField(
                          // focusNode: currentPasswordNode,
                          decoration: InputDecoration(
                            labelText: "Email",
                            fillColor: Colors.grey[100],
                            filled: true,
                            errorText: txtEmail.text.toString() != "" && !txtEmail.text.toString().contains("@")
                              ? "Please enter a valid email ..."
                              : null,
                            focusedBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15),
                              borderSide: const BorderSide(color: Colors.deepPurpleAccent, width:  1.75 )
                            ),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15),
                              borderSide: const BorderSide( color: Colors.pink, width: 0.75  )
                            )  
                          ),
                          controller:  txtEmail,
                        ),
                      ), 
    
                      const SizedBox(height: 15,),
    
                      Padding(
                        padding: const EdgeInsets.symmetric(horizontal: 25),
                        child: TextField(
                          obscureText: isShowPass,
                          decoration: InputDecoration(
                            labelText: "Password",
                            fillColor: Colors.grey[100],
                            filled: true,
                            focusedBorder: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15),
                              borderSide: const BorderSide(color: Colors.deepPurpleAccent, width:  1.75 )
                            ),
                            border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(15),
                              borderSide: const BorderSide( color: Colors.pink, width: 0.75  )
                            )  ,
                            suffixIcon: GestureDetector(
                              onTap: (){
                                setState(() {
                                  isShowPass = !isShowPass;
                                });
                              },
                              child: Padding(
                                padding: const EdgeInsets.only(right: 20),
                                child: Icon(isShowPass? Icons.remove_red_eye_rounded : Icons.visibility_off_rounded, size: 27, color: Colors.grey,),
                              )
                            )
                          ),
                          controller:  txtPassword,
                        ),
                      ), 
          
                      const SizedBox(height: 15,),
                      //Button sign in
                      Padding(
                        padding: const EdgeInsets.symmetric(horizontal: 25.0),
                        child: GestureDetector(
                          onTap: touchSignIn,
                          child: Container(
                            height: 50,
                            decoration: BoxDecoration(
                                color: Colors.deepPurple,
                                borderRadius: BorderRadius.circular(15)
                            ),
                            child:const  Center(
                                child: Text('Sign In',
                                  style: TextStyle(fontSize: 20,fontWeight: FontWeight.bold,color: Colors.white),)
                            ),
                          ),
                        ),
                      ),
          
                      const SizedBox(height: 15,),
                      //forgot password
          
                      GestureDetector(
                        onTap: (){
                          Navigator.push(
                            context,
                            MaterialPageRoute(builder: (context) => const ForgotPasswordScreen()),
                          );
                        },
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: const [
                            Text('Forgot password? ',style: TextStyle(
                                color: Colors.black,
                                fontWeight: FontWeight.bold
                            ),),
                            Text('Get Password',style: TextStyle(
                                color: Colors.deepPurpleAccent,
                                fontWeight: FontWeight.bold
                            ),)
                          ],
                        ),
                      ),
                      const SizedBox(height: 40,)
                    ],
                  ),
                ),
              ),
            ),
          )
      ),
    );
  }
}
