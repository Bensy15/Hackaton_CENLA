import 'package:flutter/material.dart';

class ChatListPage extends StatefulWidget {
  const ChatListPage({super.key});

  @override
  State<ChatListPage> createState() => _ChatListPageState();
}

class _ChatListPageState extends State<ChatListPage> {
  final Color backgroundColor1 = const Color(0xFFFFFDF2);
  final Color backgroundColor2 = const Color(0xFFF0EDDF);
  final Color highlightColor = const Color(0xFFC19E9E);
  final Color foregroundColor = const Color(0xFF654321);

  final TextEditingController _searchController = TextEditingController();
  final List<ChatContact> _contacts = [
    ChatContact(
      name: 'Анна Петрова',
      lastMessage: 'Здравствуйте, с чем нужна помощь?',
      time: '12:30',
      unread: true,
      messages: [
        Message(text: 'Здравствуйте! С чем нужна помощь? Вы отправляли заявку.', isMe: false, time: '12:25'),
        Message(text: 'Здравствуйте, Да!', isMe: true, time: '12:30'),
      ],
    ),
    ChatContact(
      name: 'Иван Иванов',
      lastMessage: 'Договорились на завтра',
      time: '10:15',
      unread: false,
      messages: [
        Message(text: 'Здравствуйте!', isMe: false, time: '10:10'),
        Message(text: 'С чем нужна помощь? Вы отправляли заявку.', isMe: false, time: '10:15'),
      ],
    ),
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: backgroundColor1,
        elevation: 0,
        title: const Text(
          'Платформа добрых дел',
          style: TextStyle(
            color: Color(0xFF654321),
            fontSize: 20,
            fontWeight: FontWeight.bold,
          ),
        ),
        centerTitle: true,
        leading: Padding(
          padding: const EdgeInsets.only(left: 16.0),
          child: Image.asset('assets/images/logo.png', width: 40, height: 40),
        ),
      ),
      body: Column(
        children: [
          Padding(
            padding: const EdgeInsets.all(16.0),
            child: TextField(
              controller: _searchController,
              decoration: InputDecoration(
                hintText: 'Поиск...',
                prefixIcon: const Icon(Icons.search),
                filled: true,
                fillColor: backgroundColor2,
                border: OutlineInputBorder(
                  borderRadius: BorderRadius.circular(20),
                  borderSide: BorderSide.none,
                ),
                contentPadding: const EdgeInsets.symmetric(vertical: 0),
              ),
            ),
          ),
          Expanded(
            child: ListView.builder(
              itemCount: _contacts.length,
              itemBuilder: (context, index) {
                final contact = _contacts[index];
                return ListTile(
                  leading: CircleAvatar(
                    backgroundColor: highlightColor,
                    child: Text(
                      contact.name.split(' ').map((e) => e[0]).take(2).join(),
                      style: TextStyle(color: foregroundColor),
                    ),
                  ),
                  title: Text(
                    contact.name,
                    style: TextStyle(
                      fontWeight: contact.unread ? FontWeight.bold : FontWeight.normal,
                      color: foregroundColor,
                    ),
                  ),
                  subtitle: Text(
                    contact.lastMessage,
                    style: TextStyle(
                      fontWeight: contact.unread ? FontWeight.bold : FontWeight.normal,
                      color: foregroundColor.withOpacity(0.7),
                    ),
                  ),
                  trailing: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Text(
                        contact.time,
                        style: TextStyle(
                          color: foregroundColor.withOpacity(0.6),
                          fontSize: 12,
                        ),
                      ),
                      if (contact.unread)
                        Container(
                          margin: const EdgeInsets.only(top: 4),
                          width: 12,
                          height: 12,
                          decoration: BoxDecoration(
                            color: highlightColor,
                            shape: BoxShape.circle,
                          ),
                        ),
                    ],
                  ),
                  onTap: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) => ChatScreen(contact: contact),
                      ),
                    );
                  },
                );
              },
            ),
          ),
        ],
      ),
    );
  }
}

class ChatScreen extends StatelessWidget {
  final ChatContact contact;

  const ChatScreen({super.key, required this.contact});

  @override
  Widget build(BuildContext context) {
    final foregroundColor = const Color(0xFF654321);
    final highlightColor = const Color(0xFFC19E9E);

    return Scaffold(
      appBar: AppBar(
        backgroundColor: const Color(0xFFFFFDF2),
        elevation: 0,
        title: Row(
          children: [
            CircleAvatar(
              backgroundColor: highlightColor,
              child: Text(
                contact.name.split(' ').map((e) => e[0]).take(2).join(),
                style: TextStyle(color: foregroundColor),
              ),
            ),
            const SizedBox(width: 12),
            Text(
              contact.name,
              style: TextStyle(color: foregroundColor),
            ),
          ],
        ),
        leading: IconButton(
          icon: const Icon(Icons.arrow_back, color: Color(0xFF654321)),
          onPressed: () => Navigator.pop(context),
        ),
      ),
      body: Column(
        children: [
          Expanded(
            child: ListView.builder(
              padding: const EdgeInsets.all(16),
              itemCount: contact.messages.length,
              itemBuilder: (context, index) {
                final message = contact.messages[index];
                return Align(
                  alignment: message.isMe ? Alignment.centerRight : Alignment.centerLeft,
                  child: Container(
                    margin: const EdgeInsets.only(bottom: 8),
                    padding: const EdgeInsets.symmetric(
                      horizontal: 16,
                      vertical: 10,
                    ),
                    decoration: BoxDecoration(
                      color: message.isMe
                          ? highlightColor
                          : const Color(0xFFF0EDDF),
                      borderRadius: BorderRadius.circular(20),
                    ),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.end,
                      children: [
                        Text(
                          message.text,
                          style: TextStyle(
                            color: message.isMe
                                ? Colors.white
                                : foregroundColor,
                          ),
                        ),
                        const SizedBox(height: 4),
                        Text(
                          message.time,
                          style: TextStyle(
                            color: message.isMe
                                ? Colors.white70
                                : foregroundColor.withOpacity(0.6),
                            fontSize: 10,
                          ),
                        ),
                      ],
                    ),
                  ),
                );
              },
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: Row(
              children: [
                Expanded(
                  child: TextField(
                    decoration: InputDecoration(
                      hintText: 'Написать сообщение...',
                      filled: true,
                      fillColor: const Color(0xFFF0EDDF),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.circular(30),
                        borderSide: BorderSide.none,
                      ),
                      contentPadding: const EdgeInsets.symmetric(
                        horizontal: 20,
                        vertical: 10,
                      ),
                    ),
                  ),
                ),
                IconButton(
                  icon: Icon(Icons.send, color: highlightColor),
                  onPressed: () {
                    // Отправка сообщения
                  },
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}

class ChatContact {
  final String name;
  final String lastMessage;
  final String time;
  final bool unread;
  final List<Message> messages;

  ChatContact({
    required this.name,
    required this.lastMessage,
    required this.time,
    required this.unread,
    required this.messages,
  });
}

class Message {
  final String text;
  final bool isMe;
  final String time;

  Message({
    required this.text,
    required this.isMe,
    required this.time,
  });
}