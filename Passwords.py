from random import randint
import random
import datetime
from sqlite3 import Time
Letters = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "v", "x", "y", "z"]
Numbers = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"]
Capital_letter = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "V", "X", "Y", "Z"]
Words = ["dog", "cat", "duck", "little", "much", "your", "water", "answer", "banana", "apple"]
while True:
    a = input("Введите количество символов о 8 до 12: ")
    if a == "закончить":
        print("Программа закончена")
        break
    if int(a) < 8 or int(a) > 12:
        print("Неверная команда")
        continue
    Word = random.choice(Words)
    Symbols = int(a) - len(Word)

    Word_number = randint(0, Symbols)
    Letter_number = randint(0, Symbols)
    while Letter_number == Word_number:
         Letter_number = randint(0, Symbols)

    Password = ""
    c = Symbols + 1
    for i in range(0, c):
        Stage = 0
        if Word_number == i:
            Password += Word
            Stage = 1
        if Letter_number == i:
            Password += random.choice(Capital_letter)
            Stage = 1
        if Stage == 0:
            b = randint(0, 1)
            if b == 0:
                Password += random.choice(Numbers)
            else:
                Password += random.choice(Letters)
    print(Password)
    c = input("Сохранить код?")
    if c == "да":
        file = open("PasswordsPY.txt", "w")
        Date = datetime.datetime.now()
        Time = Date.strftime("%H:%M:%S")
        file.write(Password + " time: " + Time)
        file.close()