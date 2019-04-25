# Приложение для управления базой резюме — тестовое на джуниора

Находчвый разработчик Вениамин решил сменить место работы и уже заприметил подходящие компании куда следует отправить резюме. Однако, чтобы повысить шансы на успех (что резюме по достоинству оценят в избранных компаниях) Вениамин решил провести небольшой эксперимент-исследование: создать несколько версий своего резюме отличающихся друг от друга содержанием и разослать их от вымышленных имен в разные компании (не из списка избранных); из всех версий в итоге выбрать ту, на которую было больше всего положительных откликов (приглашений на собеседование); отправить самую удачную версию в избранные компании.

### Задача:

* Реализовать web приложение для управления базой резюме (загружаемый файл или простой текст) со следующим функционалом:
* Управление профилями компаний (название, сайт, адрес, телефон): создание, изменение, удаление, просмотр списка всех компаний.
* Управление версиями резюме (название должности, загружаемый файл или текст резюме, дата создания, дата изменения): создание, изменение, удаление, просмотр списка всех вариантов резюме.
* Фиксация сведений об отправленных резюме и реакции на них: в базу данных необходимо записывать сведения о положительной и отрицательной реакции на отправленную версию резюме, когда и кому оно было отправлено (дата и время).
* Отображение информации со сводной статистикой на отдельной странице: какая версия резюме получила наибольшее количество положительных оценок; статистика положительных откликов по дням недели (диаграмма) — в какой день было больше всего положительных откликов (по всем версиям резюме).

### Требования:

1. Использовать для построения приложения php фреймворк Symfony 3.3
2. Использовать базу данных (MySQL, PostgreSQL)
3. Оформить код в соответствии со стандартами PSR
4. Исходный код приложения выложить в открытый репозиторий (Github, Bitbucket, Gitlab)
5. Написать краткую инструкцию по запуску приложения
  * Использовать миграции
  * Создать фикстуру для заполнения базы тестовыми данными
  * Предложить варианты развития функционала приложения