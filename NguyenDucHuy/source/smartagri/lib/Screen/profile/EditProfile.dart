// ignore_for_file: file_names, avoid_print, use_build_context_synchronously, unused_local_variable, non_constant_identifier_names

import 'dart:async';
import 'dart:io';

import 'package:awesome_dialog/awesome_dialog.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_storage/firebase_storage.dart';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';

class EditProfileScreen extends StatefulWidget {
  const EditProfileScreen({Key? key}) : super(key: key);

  @override
  State<EditProfileScreen> createState() => _EditProfileScreenState();
}

  // String fullname = "Nguyen Duc Huy";
  

  

class _EditProfileScreenState extends State<EditProfileScreen> {

  // variable update Profile
  String urlImage = "";
  TextEditingController txtFullName = TextEditingController();
  TextEditingController txtAddress = TextEditingController();
  TextEditingController txtPhone = TextEditingController();
  TextEditingController txtEmail = TextEditingController();

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

  void touchSave(){
    // print(urlImage);
    setState(() {
        txtPhone.text = chuanHoaPhoneNumber(txtPhone.text.toString());
      });
    String urlImageUpdate = "";
      if (isPickImage) {
        urlImageUpdate = urlImage;
      } else {
        urlImageUpdate  = urlImageInit;
      }
    String txtFullNameUpdate = txtFullName.text;
    String txtAddressUpdate = txtAddress.text;
    String txtPhoneUpdate = txtPhone.text;

    print("  $urlImageUpdate  $txtFullNameUpdate $txtAddressUpdate $txtPhoneUpdate   $urlImage");
    print("init   $urlImageInit");
    print("upload    $urlImage");

    if (txtPhoneUpdate.toString().replaceAll(" ", '').length == 10 
      && txtPhoneUpdate.toString().replaceAll(" ", '')[0] == "0"
      && txtAddressUpdate !=""
      && txtFullNameUpdate !=""
    ){
      
      diaLogLoading();

      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      users
          .doc(FirebaseAuth.instance.currentUser!.uid)
          .update({
              'Address': txtAddressUpdate,
              'Avartar': urlImageUpdate,
              'FullName': txtFullNameUpdate,
              'PhoneNumber': txtPhoneUpdate,
          })
          .then((value) {
            Navigator.pop(context);
            Navigator.pop(context);
          })
          .catchError((error){
            AwesomeDialog(
                context: context,
                dialogType: DialogType.error,
                animType: AnimType.scale,
                title: "Error",
                desc: "Can't update your profile",
                btnCancelOnPress: (){
                },
                btnCancelText: "OK"
              ).show();
          });
    }else{
      AwesomeDialog(
        context: context,
        dialogType: DialogType.error,
        animType: AnimType.scale,
        title: "Warning",
        desc: "Please enter all field !!!",
        btnCancelOnPress: (){
        },
        btnCancelText: "OK"
      ).show();
    }
  }

  @override
  void initState() {
    super.initState();

    Timer(const Duration(milliseconds: 500), (){
      initData();
    });
  }

  File? imageFile ;

  bool isPickImage = false;
  
  imageFromGallery() async {
    diaLogLoading();
    try{
      final ImagePicker picker = ImagePicker();
      XFile? pickedFile = await picker.pickImage(source: ImageSource.gallery);
      if (pickedFile != null) {
        setState(() {
          imageFile = File(pickedFile.path);
          isPickImage = true;
        });
        uploadImage(File(pickedFile.path), pickedFile.name);
      }else{
        Navigator.pop(context);
      }
    } catch(error){
      Navigator.pop(context);
      print(" Error imageFromGallery $error ");
    }
  }

  touchChangeAvatar (){
    AwesomeDialog(
      context: context,
      dialogType: DialogType.infoReverse,
      animType: AnimType.scale,
      // showCloseIcon: true,
      title: "Upload Image",
      // desc: "please choose photo",
      btnCancelOnPress: (){
        imageFromGallery();
      },
      btnCancelColor: Colors.deepPurpleAccent,
      btnCancelText: "From Galary",
      btnOkOnPress: (){
        imageFromCamera();
      },
      btnOkColor: Colors.deepPurpleAccent,
      btnOkText: "Open Camera"
    ).show();
  }

  imageFromCamera() async {
    diaLogLoading();
    try{
      final ImagePicker picker = ImagePicker();
      XFile? pickedFile = await picker.pickImage(source: ImageSource.camera);
      if (pickedFile != null) {
        setState(() {
          imageFile = File(pickedFile.path);
          isPickImage = true;
        });

        uploadImage(File(pickedFile.path), pickedFile.name);
      }else{
        Navigator.pop(context);
      }
    } catch(error){
      Navigator.pop(context);
      print(" Error imageFromCamera $error ");
    }
  }

  Future uploadImage (File file, String name) async {
    final path = 'images/$name';
    final ref = FirebaseStorage.instance.ref().child(path);
    try {
      var imageUrl ="";
      var imageUpload = await ref.putFile(file)
      .whenComplete(()async {
        try{
          imageUrl = await ref.getDownloadURL();
          setState(() {
            urlImage = imageUrl;
          });
          
          Navigator.pop(context);
        }catch(onError){
          print("Error");
        }
      } );
    }catch (e) {
      // ...
    }
  }


  String urlImageInit = "";

  Future<void> initData() async {
    try{
      var tam = FirebaseAuth.instance.currentUser!;

      try{
      CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

      await users
        .get()
        .then((QuerySnapshot querySnapshot) {
          for (var doc in querySnapshot.docs) {
            if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
            {
              //  Get User  
              setState(() {
                txtFullName.text = doc["FullName"];
                urlImageInit = doc["Avartar"];
                txtPhone.text = doc['PhoneNumber'];
                txtAddress.text = doc['Address'];
              });
            }
          }
      });
    }catch (error){
      print(error.toString());
    }
      // txtFullName.text =  tam.displayName.toString();
      // txtAddress.text =  "Nha Trang";
      // txtPhone.text =  tam.phoneNumber.toString();
      txtEmail.text =  tam.email.toString();
    }catch (e){
      print("   ==============  error get user Detail  ==============  $e");
    }
  }

  @override
  Widget build(BuildContext context) {
    return SafeArea(
      child: Scaffold(
        body: GestureDetector(
          onTap: () {
            FocusScope.of(context).requestFocus(FocusNode());
          },
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Header(),
          
                EditAvatar(),
          
                EditDetail(),
              ],
            ),
          ),
        ),
      )
    );
  }

  Widget Header()=> Padding(
    padding: const EdgeInsets.all(20.0),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.spaceBetween,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        GestureDetector(
          onTap: (){
            Navigator.of(context).pop();
          },
          child: const Icon(Icons.keyboard_backspace_rounded, size: 45, color: Colors.deepPurpleAccent,)
        ),

        const Padding(
          padding: EdgeInsets.only( top: 20, bottom: 20),
          child: Text("Edit Profile", style: TextStyle(fontSize: 25, fontWeight: FontWeight.bold, color: Colors.black),),
        ),

        const Text('    ')
      ],
    ),
  );

  Widget EditAvatar() => Padding(
    padding: const EdgeInsets.only(bottom: 50),
    child: Row(
      mainAxisAlignment: MainAxisAlignment.center,
      crossAxisAlignment: CrossAxisAlignment.center,
      children: [
        Stack(
          children:<Widget> [
            //  =================== Image Profile =================== 
            Container(
              decoration: BoxDecoration(
                color: Colors.black,
                borderRadius: BorderRadius.circular(100),
                boxShadow: [
                  BoxShadow(
                    color: Colors.grey.withOpacity(0.5),
                    spreadRadius: 5,
                    blurRadius: 7,
                    offset: const Offset(0, 3),
                  ),
                ],
              ),
              child: ClipRRect(
                borderRadius: BorderRadius.circular(100),
                child: isPickImage
                  ? Image.file(imageFile!,  width: 160,    height: 160, fit: BoxFit.cover,  )
                  : 
                    urlImageInit ==""
                    ? Image.asset("assets/images/avatar_default.jpg",width: 160, height: 160, fit: BoxFit.cover,)
                    : Image.network(urlImageInit, width: 160, height: 160, fit: BoxFit.cover, ),
              ),
            ),

            //  =================== Button Edit Profile =================== 
            GestureDetector(
              onTap: (){
                //   Action Choose Image
                touchChangeAvatar();
              },
              child: Padding(
                padding: const EdgeInsets.only(top: 120, left: 120),
                child: Container(
                  decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(100),
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
                    padding: const EdgeInsets.all(2.0),
                    child: Container(
                      decoration: BoxDecoration(
                        color: Colors.deepPurpleAccent,
                        borderRadius: BorderRadius.circular(100)
                      ),
                      child: const Padding(
                        padding: EdgeInsets.all(5.0),
                        child: Icon(Icons.camera_alt_rounded, size: 25, color: Colors.white),
                      )
                    ),
                  ),
                )
              ),
            )
          ]
        ),
      ],
    ),
  );

  Widget EditDetail()=>Center(
    child: SizedBox(
      width: MediaQuery.of(context).size.width-60,
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          //  ------------- FULL NAME ---------------------
          TextField(
            
            decoration: InputDecoration(
              // filled: true,
              labelText: "Full Name",
              // hintText: 'hint',
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(15),
              )  
            ),
            controller:  txtFullName,
            onChanged: (value) {
              // setState(() {
              //   txtFullName.text = value ;
              // });
            },
          ), const SizedBox(height: 20,),

          //  ------------- ADDRESS ---------------------
          TextField(
            decoration: InputDecoration(
              // filled: true,
              labelText: "Address",
              // hintText: 'hint',
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(15),
              )  
            ),
            controller:  txtAddress,
            onChanged: (value) {
              // setState(() {
              //   txtAddress.text = value ;
              // });
            },
          ), const SizedBox(height: 20,),

          //  ------------- PHONE NUMBER ---------------------
          TextField(
            keyboardType: TextInputType.number,
            decoration: InputDecoration(
              // filled: true,
              labelText: "Phone Number",
              errorText: txtPhone.text.toString().replaceAll(" ", '').isNotEmpty && (txtPhone.text.toString().replaceAll(" ", '').length != 10 || txtPhone.text.toString().replaceAll(" ", '')[0]!="0") 
                ? "Please enter correct Phone number !!!" 
                : null,
              // hintText: 'hint',
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(15),
              )  
            ),
            controller:  txtPhone,
            onChanged: (value) {
              // setState(() {
                // txtPhone.text = value ;
              // });
            },
          ), const SizedBox(height: 20,),

          //  ------------- EMAIL ---------------------
          TextField(
            enabled: false,
            decoration: InputDecoration(
              filled: true,
              labelText: "Email",
              // hintText: 'hint',
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(15),
              )  
            ),
            controller:  txtEmail,
            onChanged: (value) {
              // setState(() {
                // txtEmail.text = value ;
              // });
            },
          ), const SizedBox(height: 40,),
          

          ButtonSave()
        ],
      ),
    ),
  );

  Widget ButtonSave () => Row(
    mainAxisAlignment: MainAxisAlignment.end,
    children: [
      GestureDetector(
        onTap: touchSave,
        child: Container(
          decoration:const  BoxDecoration(
            color: Colors.deepPurpleAccent,
            borderRadius: BorderRadius.only(
              bottomRight: Radius.circular(25),
              topLeft: Radius.circular(25),
              bottomLeft: Radius.circular(25),
              topRight: Radius.circular(25),
            )
          ),
          child: const  Padding(
            padding: EdgeInsets.only(bottom: 10, top: 10, left: 40,right: 40),
            child: Text("Save", style: TextStyle(fontSize: 23, fontWeight: FontWeight.bold, color: Colors.white),),
          ),
        ),
      ),
    ],
  );


  void diaLogLoading(){
    showDialog(
      context: context, 
      barrierDismissible: false,
      builder: (BuildContext context ){
        return Dialog(
          child: Padding(
            padding: const EdgeInsets.all(20.0),
            child: Row(
              mainAxisSize: MainAxisSize.min,
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Padding(
                  padding: const EdgeInsets.only(top: 20, bottom: 20),
                  child: Column(
                    mainAxisSize: MainAxisSize.min,
                    children:const  [
                      CircularProgressIndicator(color: Colors.deepPurpleAccent,)
                    ],
                  ),
                ),
                
              ],
            ),
          ),
        );
      }
    );
  }
}
