Эцп 
Традиционные системы голосования подвержены множеству рисков, включая фальсификацию результатов и нарушение конфиденциальности. Этот проект представляет собой систему электронного голосования, которая использует электронную цифровую подпись (ЭЦП) для обеспечения безопасности и подлинности голосов.

Основные функции:
Регистрация избирателей с использованием ЭЦП
Безопасное голосование
Подтверждение подлинности каждого голоса с помощью ЭЦП
Надежный подсчет голосов
Генерация отчетов о результатах голосования
Технологии:
Язык программирования: PHP
База данных: MySQL
Локальный сервер: XAMPP

Инструкции по установке и использованию:
Клонирование репозитория:
git clone https://github.com/yourusername/secure-e-voting.git
cd ecp-diplom.lc

Установка XAMPP:

Скачайте и установите XAMPP с официального сайта: https://www.apachefriends.org/index.html
Запустите XAMPP и включите Apache и MySQL.
Настройка базы данных:

Откройте phpMyAdmin, перейдя по адресу http://localhost/phpmyadmin/.
Создайте новую базу данных с именем evoting.
Импортируйте файл ecp-diplom.sql из репозитория в созданную базу данных.

Настройка проекта:

Переместите клонированный репозиторий в папку htdocs в директории установки XAMPP. Обычно это C:\xampp\htdocs\.
Откройте файл config.php в корне проекта и настройте параметры подключения к базе данных:
сonn.php
<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'ecp-diplom');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>

Запуск проекта:

Откройте браузер и перейдите по адресу http://localhost/ecp-diplom.lc.
Зарегистрируйтесь и следуйте инструкциям для голосования.

