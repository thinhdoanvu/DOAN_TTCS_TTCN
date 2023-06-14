// ignore_for_file: file_names, use_build_context_synchronously, avoid_print, non_constant_identifier_names

import 'dart:async';
import 'dart:ui';

import 'package:animations/animations.dart';
import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:flutter/material.dart';
import 'package:smartagri/Screen/LoginScreen.dart';
import 'package:smartagri/Screen/profile/AboutDeveloperScreen.dart';
import 'package:smartagri/Screen/profile/ChangePasswordScreen.dart';
import 'package:smartagri/Screen/profile/EditProfile.dart';
import 'package:smartagri/helper/dialogLoading.dart';

import 'package:smartagri/data/data_default.dart';


import 'package:cloud_firestore/cloud_firestore.dart';


class AccountScreen extends StatefulWidget {
  const AccountScreen({Key? key}) : super(key: key);

  @override
  State<AccountScreen> createState() => _AccountScreenState();
}

class _AccountScreenState extends State<AccountScreen> {

  String fullName ="";
  String avatar = "";
  String address = "";

  Future<void> touchLogout() async {
    // diaLogLoading(context,true);

    AwesomeDialog(
      context: context,
      dialogType: DialogType.question,
      animType: AnimType.scale,
      // showCloseIcon: true,
      title: "Do You want to logout ?",
      // desc: "Do You want to logout ?",
      btnCancelOnPress: (){},
      btnOkOnPress: (){
        diaLogLoading(context,true);
        Timer(const Duration(seconds: 2), () async {
          await FirebaseAuth.instance.signOut();
          
          Navigator.pop(context);
          
          Navigator.pushAndRemoveUntil(context,
            MaterialPageRoute(builder: (_) => const LoginScreen()), (route) => false
          );
        });
      }
    ).show();
  }


  late StreamSubscription <QuerySnapshot> _eventsSubscription;  

  Future<void> getProfileUser () async {
    try{
      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      _eventsSubscription  =   users
      // .doc(FirebaseAuth.instance.currentUser!.uid)
        .snapshots(includeMetadataChanges: true)
        .listen((querySnapshot){
          for (var doc in querySnapshot.docs) {
            if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
            {
              //  Get User  
              setState(() {
                fullName = doc["FullName"];
                avatar = doc["Avartar"];
                address = doc['Address'];
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
  void dispose() {
    // Cancel your subscription when the screen is disposed
    print(" Cancle Listener Firestore   Account  Screen");
    _eventsSubscription.cancel();
    _eventsSubscription.pause();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Stack(
        children: [
          BackgroundImage(),
      
          UIScreen(),
      
        ],
      ),
    );
  }
  
  Widget BackgroundImage()=>ImageFiltered(
    imageFilter: ImageFilter.blur(sigmaX: 0.0, sigmaY: 0.0),
    child: Image.asset("assets/images/60yearV3.jpg",
      height: MediaQuery.of(context).size.height,
      width: MediaQuery.of(context).size.width,
      fit: BoxFit.cover,
    ),
  );

  Widget UIScreen () => Center(
    child: Column(
      mainAxisAlignment: MainAxisAlignment.center,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        Stack(
          children: [
            Padding(
              padding: const EdgeInsets.only(top: 60,left: 15),
              child: Container(
                width : MediaQuery.of(context).size.width -30,
                // height : MediaQuery.of(context).size.width -30,
                decoration: BoxDecoration(
                  color: Colors.white.withOpacity(0.8),
                  borderRadius: BorderRadius.circular(25)
                ),
                child: Padding(
                  padding: const EdgeInsets.only(top: 70, bottom: 20),
                  child: Align(
                    alignment: Alignment.topCenter,
                    child: BodyProfile()
                  ),
                ),
              ),
            ),
  
            Align(
              alignment: Alignment.topCenter,
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.black,
                  borderRadius: BorderRadius.circular(100),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.grey.withOpacity(0.5),
                      spreadRadius: 5,
                      blurRadius: 7,
                      offset:const  Offset(0, 3),
                    ),
                  ],
                ),
                child: ClipRRect(
                  borderRadius: BorderRadius.circular(100),
                  child: Image.network(avatar ==""? dataDefault.AvatarDefault : avatar ,
                  // child: Image.network(dataDefault.AvatarDefault,
                    width: 120,
                    height: 120,
                    fit: BoxFit.fill,
                  ),
                )
              ),
            )
          ],
        ),
  
        // Padding(
        //   padding: const EdgeInsets.all(8.0),
        //   child: BodyProfile(),
        // )
      ],
    ),
  );

  Widget BodyProfile() => Column(
    children: [
      //  ------------ FULL NAME DISPLAY -----------
      Padding(
        padding: const EdgeInsets.only(bottom: 8),
        child: Text(fullName ==""? "What's your name?" : fullName, style: const TextStyle(fontSize: 23, color: Colors.black, fontWeight: FontWeight.bold),),
      ),

      //  ------------ ADDRESS DISPLAY -----------
      Row(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          const Padding(
            padding: EdgeInsets.only(right: 0),
            child: Icon(Icons.location_on_rounded,size: 15,color: Colors.grey,),
          ),
          Text(' ${address == ""? "..." : address  }',style: const TextStyle(fontSize: 15,fontWeight: FontWeight.normal,color: Color.fromRGBO(158, 158, 158, 1)))
        ],
      ),

      //  ------------ LIST MENU SETTING -----------
      Padding(
        padding: const EdgeInsets.only(top: 20),
        child: MenuSettingContainer(),
      ),

      const Padding(
        padding: EdgeInsets.only(top:20, bottom: 0),
        child: Text('App version 1.0.1', style: TextStyle(fontSize: 13, color: Colors.grey),),
      )
    ],
  );

  Widget MenuSettingContainer()=>Padding(
    padding: const EdgeInsets.only(left: 40, right: 40),
    child: Column(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        // ---------- EDIT PROFILE --------------
        OpenContainer(
          transitionType: ContainerTransitionType.fadeThrough,
          transitionDuration:const  Duration(milliseconds: 400),
          closedBuilder: (BuildContext _ , VoidCallback opencontainer ){
            return  GestureDetector(
              onTap: opencontainer,
              child: ItemMenu(
                const  Icon(Icons.edit_note_rounded, size: 25, color: Colors.black,),
                const Text('Edit Your Profile',style: TextStyle(color: Colors.black, fontSize: 16, fontWeight: FontWeight.bold),)
              )
            );
          }, 
          openBuilder: (BuildContext _ , VoidCallback __ ){
            return const  EditProfileScreen();
          }
        ), const  SizedBox(height: 8,),

        // ---------- CHANGE PASSWORD --------------
        OpenContainer(
          transitionType: ContainerTransitionType.fadeThrough,
          transitionDuration:const  Duration(milliseconds: 400),
          closedBuilder: (BuildContext _ , VoidCallback opencontainer ){
            return  GestureDetector(
              onTap: opencontainer,
              child:  ItemMenu(
                  const Icon(Icons.manage_accounts_rounded, size: 25, color: Colors.black,),
                  const Text('Change Your Password',style: TextStyle(color: Colors.black, fontSize: 16, fontWeight: FontWeight.bold),)
              ),
            );
          }, 
          openBuilder: (BuildContext _ , VoidCallback __ ){
            return const ChangePasswordScreen();
          }
        ),  const SizedBox(height: 8,),

        // ---------- ABOUT DEVELOPER --------------
        OpenContainer(
          transitionType: ContainerTransitionType.fadeThrough,
          transitionDuration:const  Duration(milliseconds: 400),
          closedBuilder: (BuildContext _ , VoidCallback opencontainer ){
            return GestureDetector(
              onTap: opencontainer,
              child: ItemMenu(
                const  Icon(Icons.code_off_rounded, size: 25, color: Colors.black,),
                const Text('Contact Us',style: TextStyle(color: Colors.black, fontSize: 16, fontWeight: FontWeight.bold),)
              )
            );
          }, 
          openBuilder: (BuildContext _ , VoidCallback __ ){
            return const  AboutDeveloper();
          }
        ), const  SizedBox(height: 8,),

        // ---------- LOGOUT --------------
        GestureDetector(
          onTap: touchLogout,
          child: Container(
            decoration: BoxDecoration(
              color: Colors.white,
              borderRadius: BorderRadius.circular(5),
              boxShadow: [
                    BoxShadow(
                      color: Colors.grey.withOpacity(0.2),
                      spreadRadius: 1,
                      blurRadius: 1,
                      offset: const Offset(0, 2),
                    ),
                  ],
            ),
            child: ItemMenu(
                const Icon(Icons.logout_rounded, size: 25, color: Colors.black,),
                const Text('Logout',style: TextStyle(color: Colors.black, fontSize: 16, fontWeight: FontWeight.bold),)
            ),
          ),
        ),
      ],
    ),
  );

  Widget ItemMenu(IconFunc , TextFunc)=>Padding(
    padding: const EdgeInsets.only(top: 8, bottom: 8, left: 10),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        IconFunc,
        Padding(
          padding: const EdgeInsets.only(left: 5),
          child: TextFunc,
        )
      ],
    ),
  );
}
