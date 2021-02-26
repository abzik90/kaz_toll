import 'package:flutter/material.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:firebase_core/firebase_core.dart';

class LoginPage extends StatefulWidget {
  LoginPage({this.app});
  final FirebaseApp app;

  @override
  _LoginPageState createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  String email="";
  String password="";

  final emailController=new TextEditingController();
  final passwordController=new TextEditingController();
  final referenceFirebase=FirebaseDatabase.instance;

  @override
  Widget build(BuildContext context) {
    final ref=referenceFirebase.reference();
    return Scaffold(
      backgroundColor: Colors.grey[100],
      appBar: AppBar(
          backgroundColor: Colors.amber[500],
          centerTitle: true,
          title:Text('KazTollApp')
      ),
      body: Center(
        child:Padding(
          padding: EdgeInsets.all(10.0),
          child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children:<Widget>[
                TextField(
                  controller: emailController,
                  keyboardType: TextInputType.emailAddress,
                //  style: TextStyle(color: Colors.white),
                  decoration: InputDecoration(
                      hintText: 'Email address'
                  ),
                ),
                SizedBox(height: 5.0),
                TextField(
                  controller: passwordController,
                    keyboardType: TextInputType.visiblePassword,
                    autofocus: false,
                    obscureText: true,
                    //style: TextStyle(color: Colors.white),
                    decoration: InputDecoration(
                        hintText: 'Password'
                    )
                ),
                FlatButton.icon(
                    onPressed: (){
                      email=emailController.text;
                      password=passwordController.text;
                      //TODO: firebase connection
                      dynamic a=ref.child('users').orderByChild('email').equalTo(email).orderByChild('password').equalTo(password);
                      print(a);

                      if(email=='kek@kek.com' && password=='123')
                        Navigator.pushReplacementNamed(context,'/feedback');
                    },
                    icon: Icon(Icons.login),
                    shape: RoundedRectangleBorder(side: BorderSide(
                        color: Colors.black,
                        width: 1,
                        style: BorderStyle.solid
                    ), borderRadius: BorderRadius.circular(50)),
                    label: Text("Submit")),
                FlatButton.icon(
                    onPressed: (){
                      Navigator.pushReplacementNamed(context,'/registration');
                    },
                    icon: Icon(Icons.app_registration),
                    shape: RoundedRectangleBorder(side: BorderSide(
                        color: Colors.black,
                        width: 1,
                        style: BorderStyle.solid
                    ), borderRadius: BorderRadius.circular(50)),
                    label: Text("Tap here if you don't have an account"))
              ]
          ),
        ),
      ),
    );
  }
}

