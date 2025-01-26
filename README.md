# Singleton Pattern in PHP: User Authentication and Logging System

This project demonstrates the **Singleton design pattern** in PHP with real-world use cases:
- **User Authentication**: Ensures a single instance of `SessionManager` handles user sessions.
- **Activity Logging**: Implements a `Logger` singleton to record application activity in a file and database.

---

## Features
- Lazy initialization for Singleton instances.
- Centralized logging system with file and database options.
- Simple user authentication system.

---

## Folder Structure
- `src/`: Contains the core Singleton implementations (`SessionManager` and `Logger` and `DatabaseLogger`) and an example usage script.
- `tests/`: Optional unit tests to verify the Singleton implementation.
- `.env`: Environment variables for database credentials (ignored in Git).

---

## Installation
1. Clone this repository:
   ```bash
   git clone https://github.com/KabirLiaquat/singleton-pattern-example.git
   cd singleton-pattern-example
   composer install
   cp .env.example .env
