// ignore_for_file: non_constant_identifier_names, file_names

class UserModel {
  UserModel({
    required this.RefID,
    this.FullName,
    this.Avatar,
    required this.JsonGSheet,
    this.PhoneNumber,
  });

  final String RefID;
  final String? FullName;
  final String? Avatar;
  final String JsonGSheet;
  final String? PhoneNumber;

  factory UserModel.fromJson(Map<String, dynamic> json) {
    return UserModel(
      // uid: json['uid'],
      // username: json['username'],
      // characterID: json['character_id'],
      RefID: json['RefID'],
      FullName: json['FullName'],
      Avatar: json['Avatar'],
      JsonGSheet: json['JsonGSheet'],
      PhoneNumber: json['PhoneNumber'],
    );
  }

  factory UserModel.fromFirestore(Map<dynamic, dynamic> json) {
    return UserModel(
      // uid: json['uid'],
      // username: json['username'],
      // characterID: List<String>.from(json['character_id']),
      RefID: json['RefID'],
      FullName: json['FullName'],
      Avatar: json['Avatar'],
      JsonGSheet: json['JsonGSheet'],
      PhoneNumber: json['PhoneNumber'],
    );
  }

  Map<String, dynamic> toJson() => {
      //   "uid": uid,
      //   "username": username,
      //   "character_id": characterID,
      // };
      "RefID" : RefID,
      "FullName" : FullName,
      "Avatar" : Avatar,
      "JsonGSheet" : JsonGSheet,
      "PhoneNumber" : PhoneNumber
  };
}