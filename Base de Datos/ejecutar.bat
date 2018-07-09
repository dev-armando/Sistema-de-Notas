@echo off
cls
title Armando Rojas
color 4f
cls
echo Cargar schema
mysql -u root -p < crear.sql
echo Cargar Datos
mysql -u root -p -D pruebaplatzi < volcado.sql