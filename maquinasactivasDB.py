import os
import mysql.connector as mysql
from subprocess import Popen, PIPE
import subprocess
#ROSARIO MUÑOZ GARCÍA ITIC's
#Conectandose a base de datos

print ("Python conectándose a MySQL")
conexion = mysql.connect( host='localhost', user= 'root', passwd='', db='puertosCompu' )
operacion = conexion.cursor()

computadora = "200.33.171.124"
comando = "nmap -sT  200.33.171.124"

resultado = os.popen(comando)
puertos = resultado.readlines()
#print(puertos)
archivo1 = open ('puertos.txt', 'w')
archivo1.writelines(puertos)
archivo1.close()

archivo = open ('puertos.txt')
texto = archivo.readlines()
archivo.close()
#print(texto)
texto2 = texto
sql = "INSERT INTO Computadoras (IP, Puerto, Estado, Servicio) VALUES (%s, %s, %s, %s)"
print(texto2)
for puerto in texto2[6:len(texto2)-2]:
    print(puerto.split())
    operacion.execute(sql, (computadora, puerto.split()[0],puerto.split()[1],puerto.split()[2]))
    conexion.commit()
    #operacion.execute( 'INSERT INTO Computadoras (IP, Puerto, Estado, Servicio) VALUES (200.33.171.124,'+puerto.split()[0]+','+puerto.split()[1]+','+puerto.split()[2]) 
    
    #print(puerto.split())
conexion.close()


"""red = "200.33.171.0/24"
os.system("nmap -sT  -v " + red )
"""
