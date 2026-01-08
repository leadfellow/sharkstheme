@echo off
REM Jututoa serveri käivitamine (Windows)

echo.
echo ========================================
echo   JUTUTOA SERVER
echo ========================================
echo.
echo Kaivitan PHP serverit...
echo Kaust: %CD%
echo URL: http://localhost:8000/index.html
echo Test: http://localhost:8000/test-chat.html
echo.
echo Sulgemiseks vajuta CTRL+C
echo.
echo ========================================
echo.

php -S localhost:8000

pause

