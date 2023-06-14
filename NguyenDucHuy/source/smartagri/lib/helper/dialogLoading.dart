// ignore_for_file: file_names

import 'package:flutter/material.dart';

void diaLogLoading(context,isShow){
  if( isShow){
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