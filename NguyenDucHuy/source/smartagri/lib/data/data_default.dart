// ignore_for_file: camel_case_types

import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:firebase_auth/firebase_auth.dart';

class dataDefault {

  // ignore: constant_identifier_names
  static const AvatarDefault = "https://raw.githubusercontent.com/duchuy-bit/Tour-Booking/main/avatar_default.jpg";

  Future<void> getProfileUser () async {
    CollectionReference users = FirebaseFirestore.instance.collection('TblUsers');

    await users
    // .doc(FirebaseAuth.instance.currentUser!.uid)
      .get()
      .then((QuerySnapshot querySnapshot) {
        for (var doc in querySnapshot.docs) {
            if( doc['RefID'] == FirebaseAuth.instance.currentUser!.uid)
            {
              //  Check Log account
              if ( doc['IsActived'] ==  false) {
                // ignore: avoid_print
                print("  Log Out ");
                FirebaseAuth.instance.signOut();
              }
            }
        }
    });
  }
}