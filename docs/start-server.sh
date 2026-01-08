#!/bin/bash

# Jututoa serveri käivitamine
echo "🚀 Käivitan PHP serverit..."
echo "📁 Kaust: $(pwd)"
echo "🌐 URL: http://localhost:8000/index.html"
echo "🧪 Test: http://localhost:8000/test-chat.html"
echo ""
echo "⏹️  Sulgemiseks vajuta CTRL+C"
echo ""

# Käivita PHP built-in server
php -S localhost:8000

