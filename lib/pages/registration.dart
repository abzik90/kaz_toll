import 'package:flutter/material.dart';
import 'package:firebase_database/firebase_database.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:toast/toast.dart';

class RegistrationPage extends StatefulWidget {
  RegistrationPage({this.app});
  final FirebaseApp app;

  @override
  _RegistrationPageState createState() => _RegistrationPageState();
}

class _RegistrationPageState extends State<RegistrationPage> {
  final emailController=new TextEditingController();
  final passwordController=new TextEditingController();
  final driverIDController=new TextEditingController();

  final referenceFirebase=FirebaseDatabase.instance;

  @override
  Widget build(BuildContext context) {
    final ref=referenceFirebase.reference();
    return Scaffold(
      appBar: AppBar(
        title:Text('Registration'),
        backgroundColor: Colors.amber[500],
        centerTitle: true,
      ),
      body:Center(
        child:Padding(
          padding: EdgeInsets.all(10.0),
          child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children:<Widget>[
                TextField(
                  controller: emailController,
                  keyboardType: TextInputType.emailAddress,
                  decoration: InputDecoration(
                      hintText: 'Email address'
                  ),
                ),
                SizedBox(height: 5.0),
                TextField(
                  controller: driverIDController,
                  keyboardType: TextInputType.text,
                  decoration: InputDecoration(
                      hintText: 'Driver ID'
                  ),
                ),
                SizedBox(height: 5.0),
                TextField(
                  controller: passwordController,
                  keyboardType: TextInputType.emailAddress,
                  autofocus: false,
                  obscureText: true,
                  decoration: InputDecoration(
                      hintText: 'Password'
                  ),
                ),
                SizedBox(height: 5.0),
                FlatButton.icon(
                    onPressed: (){
                      FocusScope.of(context).unfocus();
                      if(emailController.text!=""&&passwordController.text!=""&&driverIDController.text!="") {
                          ref.child("users").push().set(<String, Object>{
                            "email": emailController.text,
                            "password": passwordController.text,
                            "driverid": driverIDController.text,
                          }).asStream();

                          emailController.clear();
                          passwordController.clear();
                          driverIDController.clear();
                          Navigator.pushReplacementNamed(context, '/');
                      }else{
                        Toast.show("All fields should be filled", context, duration: Toast.LENGTH_SHORT, gravity:  Toast.BOTTOM);
                      }
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
                      Navigator.pushReplacementNamed(context,'/');
                    },
                    icon: Icon(Icons.exit_to_app),
                    shape: RoundedRectangleBorder(side: BorderSide(
                        color: Colors.black,
                        width: 1,
                        style: BorderStyle.solid
                    ), borderRadius: BorderRadius.circular(50)),
                    label: Text("Tap here if you already have an account"))
              ]
          ),
        ),
      ),
    );
  }
}
