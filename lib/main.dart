import 'package:flutter/material.dart';
import 'package:flutter_webview_plugin/flutter_webview_plugin.dart';
import 'dart:io';
import 'package:flutter/services.dart';

void main() {
  SystemChrome.setEnabledSystemUIOverlays([SystemUiOverlay.bottom]);
  // SystemChrome.setSystemUIOverlayStyle(SystemUiOverlayStyle(
  //   statusBarColor:Colors.transparent,
  //   statusBarBrightness:Brightness.light,
  // ));
  return runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner:false,
      home: WebviewScaffold(
        url: 'https://nudespatium.space/baha/',
        //javascriptMode: JavascriptMode.unrestricted,
        withLocalUrl:true,
        withLocalStorage: true,
        ),
      );
  }
}

