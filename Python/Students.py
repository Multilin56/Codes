class Student:
    def __init__(self, name = "Ivan", groupNumber = "10A", age = 18):
        self.__name = name
        self.__groupNumber = groupNumber
        self.__age = age

    def get_name(self):
        return self.__name


    def get_groupNumber(self):
        return self.__groupNumber

    def set_groupNumber(self, groupNumber):
        self.__groupNumber = groupNumber


    def get_age(self):
        return self.__age

    def set_age(self, age):
        self.__age = age

S1 = Student("Anna", "5C", 11)
S2 = Student("Ivan", "11B", 16)
S3 = Student("Andrey", "8K", 14)
S4 = Student("Nasta", "3F", 9)
S5 = Student("Denis", "6H", 12)