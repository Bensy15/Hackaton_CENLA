import 'package:flutter/material.dart';
import 'package:xacaton/screens/chat_screens.dart';

class InfoScreen extends StatelessWidget {
  const InfoScreen({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Row(
          children: [
            Icon(Icons.favorite, color: Colors.red, size: 30),
            const SizedBox(width: 10),
            const Text(
              'Платформа добрых дел',
              style: TextStyle(
                fontSize: 20,
                fontWeight: FontWeight.bold,
              ),
            ),
          ],
        ),
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'Добрые дела',
              style: TextStyle(
                fontSize: 24,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 20),
            _buildDeedCard(
              context,
              title: 'Всероссийская неделя субботников',
              date: '1-10 апреля',
              location: 'г. Тула',
              description: 'Требуются волонтеры для помощи в облагораживании территорий: парков города и скверов',
            ),
            const SizedBox(height: 16),
            _buildDeedCard(
              context,
              title: 'Помощь в доме престарелых',
              date: '1-10 апреля',
              location: 'г. Тула',
              description: 'Требуются волонтеры для помощи в домах престарелых',
            ),
            const SizedBox(height: 16),
            _buildDeedCard(
              context,
              title: 'Помощь бездомным животным',
              date: '15-30 апреля',
              location: 'г. Тула',
              description: 'Требуются волонтеры в приют для животных: выгул, кормление, уход',
            ),
            const SizedBox(height: 16),
            _buildDeedCard(
              context,
              title: 'Сбор гуманитарной помощи',
              date: '5-25 апреля',
              location: 'г. Тула',
              description: 'Сбор и сортировка гуманитарной помощи для нуждающихся семей',
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildDeedCard(
    BuildContext context, {
    required String title,
    required String date,
    required String location,
    required String description,
  }) {
    return Card(
      elevation: 4,
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(12),
      ),
      child: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              title,
              style: const TextStyle(
                fontSize: 18,
                fontWeight: FontWeight.bold,
              ),
            ),
            const SizedBox(height: 8),
            Row(
              children: [
                const Icon(Icons.calendar_today, size: 16, color: Colors.grey),
                const SizedBox(width: 4),
                Text(date, style: TextStyle(color: Colors.grey[700])),
                const SizedBox(width: 16),
                const Icon(Icons.location_on, size: 16, color: Colors.grey),
                const SizedBox(width: 4),
                Text(location, style: TextStyle(color: Colors.grey[700])),
              ],
            ),
            const SizedBox(height: 12),
            Text(description),
            const SizedBox(height: 16),
            Align(
              alignment: Alignment.centerRight,
              child: ElevatedButton(
                onPressed: () {
                  Navigator.push(
                    context,
                    MaterialPageRoute(
                      builder: (context) => const ChatListPage(),
                    ),
                  );
                },
                style: ElevatedButton.styleFrom(
                  backgroundColor: Colors.green,
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(20),
                  ),
                  padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 12),
                ),
                child: const Text(
                  'Откликнуться',
                  style: TextStyle(color: Colors.white),
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}