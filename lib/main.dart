import 'package:flutter/material.dart';
import 'package:kaz_toll/pages/login.dart';
import 'package:kaz_toll/pages/registration.dart';
import 'package:kaz_toll/pages/feedback.dart';
import 'package:kaz_toll/pages/gps.dart';

void main() =>runApp(MaterialApp(
    initialRoute:'/',
    routes:{
      '/': (context) => LoginPage(),
      '/registration': (context) => RegistrationPage(),
      '/gps': (context) => GPSPage(),
      '/feedback': (context) => FeedbackPage(),

  },
));


