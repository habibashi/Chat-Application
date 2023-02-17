@extends('layout')

@section('content')
@php
$user = Auth::user();
    
@endphp
<div class="container-bg-color" style="background-color: white">
    <div class="top-section">
      <img src="https://images.pexels.com/photos/9427363/pexels-photo-9427363.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="Chat Logo" class="chat-logo">
      <div class="user-info">
        <h2 class="user-name">Group</h2>
      </div>
    </div>
    <hr style="margin-bottom: 5px">
    <ul class="middle-section">
      {{-- <li class="left-chat">
        <span>name</span>
        <p class="chat-message-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </li>
      <li class="right-chat">
        <p class="chat-message-right">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <img src="https://images.pexels.com/photos/9427363/pexels-photo-9427363.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="User Avatar" class="user-avatar">
      </li> --}}
      
    </ul>
    <form id="chat-form">
      {{-- @csrf --}}
      {{-- @if () --}}
      <div class="bottom-section">
        <input id="chat-input" type="text" class="chat-input" placeholder="Type a message...">
        <button type="submit" class="send-button">
          <svg style="width: 35px; height: 25px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
          </svg>
        </button>
      </div>
    </form>
</div>

  
<script src="{{ mix('js/app.js') }}"></script>
@endsection