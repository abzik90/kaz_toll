import 'package:flutter/material.dart';

class GPSPage extends StatefulWidget {
  @override
  _GPSPageState createState() => _GPSPageState();
}

class _GPSPageState extends State<GPSPage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title:Text('GPS location'),
        backgroundColor: Colors.amber[500],
        centerTitle: true,
      ),
      body:Center(
        child:Padding(
          padding: EdgeInsets.all(10.0),
          child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children:<Widget>[]
          ),
        ),
      ),
    );
  }
}
