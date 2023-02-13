<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>chatApp</title>
</head>
<body>
  <header>
    <nav class="nav">
      <div class="left-nav">
        <a><img width="200" style="color: white" height="40" src="image/office-chat-logos-idu-y2wZ2t.png" alt=""></a>
      </div>
      @auth
      <div class="left-nav">
      </div>
      <div class="right-nav">
        <div class="dropdown">
          <button class="dropdown-button">
            <img src="https://images.pexels.com/photos/10352348/pexels-photo-10352348.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="Your name">
            <span>Habib Ashi</span>
          </button>
          <div class="dropdown-content">
            <a href="/profile">Profile</a>
            <a href="#">Settings</a>
            <form method="POST" action="/logout">
              @csrf
              <button class="my-button" style="color: black" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="right-nav">
        <a href="/register">Register</a>
        <a href="/login">Login</a>
      </div>
      @endauth
    </nav>
  </header>

  @auth
  <main style="display: flex">
  @endauth
    @auth
      <div class="sidebar">
        <a href="/groups" class="btn" style="display: flex; align-items: center; gap: 10px">
            <svg style="width: 25px; height: 25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
          </svg>
          Groups
        </a>
        <a href="/people" class="btn" style="display: flex; align-items: center; gap: 10px">
            <svg style="width: 25px; height: 25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
          </svg>
          People
        </a>
        <a href="#" class="btn" style="display: flex; align-items: center; gap: 10px">
          <svg style="width: 25px; height: 25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
          </svg>
          Downloads
        </a>
      </div>
    @endauth
    @yield('content')
  </main>
</body>
</html>