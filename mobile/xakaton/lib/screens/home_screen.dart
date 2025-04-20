import 'package:flutter/material.dart';
import 'package:xacaton/screens/registration_screen.dart';
import 'package:xacaton/screens/registration_user.dart';
import 'package:xacaton/screens/info_screen.dart';

class HomeScreen extends StatelessWidget {
  final Color backgroundColor1 = const Color(0xFFFFFDF2);
  final Color backgroundColor2 = const Color(0xFFF0EDDF);
  final Color highlightColor = const Color(0xFFC19E9E);
  final Color foregroundColor = const Color(0xFF654321);

  const HomeScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: BoxDecoration(
          gradient: LinearGradient(
            begin: Alignment.centerLeft,
            end: Alignment.centerRight,
            colors: [backgroundColor1, backgroundColor2],
          ),
        ),
        child: Center(
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Image.asset(
                  'assets/images/logo.png',
                  width: 150,
                  height: 150,
                  fit: BoxFit.contain,
                  errorBuilder: (context, error, stackTrace) {
                    return Icon(
                      Icons.help_outline,
                      size: 100,
                      color: foregroundColor,
                    );
                  },
                ),
                const SizedBox(height: 30),
                Text(
                  "Платформа добрых дел",
                  style: TextStyle(
                    color: foregroundColor,
                    fontSize: 20,
                  ),
                ),
                const SizedBox(height: 50),
                SizedBox(
                  width: MediaQuery.of(context).size.width * 0.8,
                  child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: highlightColor,
                      padding: const EdgeInsets.symmetric(vertical: 20),
                      shape: const RoundedRectangleBorder(
                        borderRadius: BorderRadius.zero,
                      ),
                    ),
                    onPressed: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => const RegistrationUser(),
                        ),
                      );
                    },
                    child: Text(
                      "Нужна помощь",
                      style: TextStyle(
                        color: foregroundColor,
                        fontSize: 18,
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 20),
                SizedBox(
                  width: MediaQuery.of(context).size.width * 0.8,
                  child: ElevatedButton(
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Colors.transparent,
                      padding: const EdgeInsets.symmetric(vertical: 20),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(0),
                        side: BorderSide(
                          color: foregroundColor,
                          width: 1.0,
                        ),
                      ),
                    ),
                    onPressed: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => const RegistrationScreen(),
                        ),
                      );
                    },
                    child: Text(
                      "Хочу помочь",
                      style: TextStyle(
                        color: foregroundColor,
                        fontSize: 18,
                      ),
                    ),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}