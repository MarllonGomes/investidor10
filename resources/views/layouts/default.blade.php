<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Investidor10 - @yield('title')</title>

    <link rel="icon" href="{{ asset('img/php.png') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <header class="main-header">
        <div class="content-area">
            <div class="logo-area">
                <a href="/" class="logo">INVESTIDOR 10</a>
            </div>
            <ul class="main-menu">
                <li class="menu-item">
                    <a href="/admin/noticias">GERENCIAR NOTICIAS</a>
                </li>
                <li class="menu-item">
                    <a href="/">EXIBIR NOTÍCIAS</a>
                </li>
            </ul>
            <div class="form-area">
                <form action="" method="GET">
                    <div class="input-group">
                        <input type="search" name="s" value="{{ $_GET['s'] ?? '' }}" placeholder="Pesquisar Notícias...">
                        <button type="submit">
                            <img src="{{ asset('img/search.png') }}" alt="Ícone Pesquisar">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="sidebar">
                @livewire('categories')
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
    
    <footer class="main-footer">
        DESENVOLVIDO POR <a href="https://github.com/MarllonGomes">MARLLON GOMES</a>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>