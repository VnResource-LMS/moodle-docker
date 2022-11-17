@echo off
title Setup mooodle!
PUSHD %cd%
CD %~dp0..
SET BASEDIR=%cd%\moodle
echo %BASEDIR%
IF exist "%BASEDIR%/moodledata" (
    echo "exist moodledata folder" 
) ELSE (
    powershell.exe -ExecutionPolicy Bypass -Command "mkdir %BASEDIR%/moodledata"
)
powershell.exe -ExecutionPolicy Bypass -Command "cp $pwd/moodle/.env.example $pwd/moodle/.env"
call git clone --branch MOODLE311_STABLE --depth 1 --single-branch https://github.com/kietchungvnr/MOODLE_37.git %BASEDIR%\source
powershell.exe -ExecutionPolicy Bypass -Command "cp $pwd/moodle/config.docker-template.php $pwd/moodle/source/config.php"
pause