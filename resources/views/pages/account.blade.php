@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="user">
<img class="waves" src="images/sky_wave.svg">

  <div class="modout">

    <a href="{{ route('account_edit') }}" id="modif">

    <svg xmlns="http://www.w3.org/2000/svg" class="edit" width="18.001" height="20" viewBox="0 0 28.001 30">
      <g id="Expanded" transform="translate(-2 0)">
        <g id="Groupe_90" data-name="Groupe 90">
          <g id="Groupe_86" data-name="Groupe 86" transform="translate(2 0.496)">
            <g id="Rectangle_55" data-name="Rectangle 55" transform="translate(0 -0.496)" fill="#fff" stroke="#e4534b" stroke-width="2">
              <rect width="22.201" height="30" rx="8" stroke="none"/>
              <rect x="1" y="1" width="20.201" height="28" rx="7" fill="none"/>
            </g>
            <rect id="Rectangle_56" data-name="Rectangle 56" width="3" height="4" transform="translate(21.408 4.176) rotate(45)" fill="#fff"/>
          </g>
          <g id="Groupe_87" data-name="Groupe 87" transform="translate(13.75 10.625)">
            <path id="Tracé_1395" data-name="Tracé 1395" d="M22,17" transform="translate(-22 -17)" fill="#e4534b"/>
          </g>
          <g id="Groupe_88" data-name="Groupe 88" transform="translate(12.922)">
            <path id="Tracé_1396" data-name="Tracé 1396" d="M21.261,17.077a.624.624,0,0,1-.559-.9l1.765-3.531a.612.612,0,0,1,.117-.162L34.5.566A1.821,1.821,0,0,1,35.8,0a1.954,1.954,0,0,1,1.771,1.217,1.788,1.788,0,0,1-.426,2L25.233,15.129a.641.641,0,0,1-.162.117L21.54,17.012A.623.623,0,0,1,21.261,17.077Zm2.278-3.785-.882,1.766,1.766-.883L36.265,2.331a.55.55,0,0,0,.156-.637.725.725,0,0,0-.618-.446.6.6,0,0,0-.421.2Z" transform="translate(-20.636)" fill="#e4534b"/>
          </g>
          <g id="Groupe_89" data-name="Groupe 89" transform="translate(24.838 2.148)">
            <path id="Tracé_1397" data-name="Tracé 1397" d="M42.118,6.456a.625.625,0,0,1-.442-.183L39.911,4.507a.624.624,0,1,1,.883-.883L42.559,5.39a.624.624,0,0,1-.441,1.066Z" transform="translate(-39.729 -3.441)" fill="#e4534b"/>
          </g>
        </g>
      </g>
    </svg>
      <p>Modifier</p>
    </a>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       id="logout">
    <svg xmlns="http://www.w3.org/2000/svg" class="logout" width="23.695" height="20" viewBox="0 0 33.695 30">
      <g id="noun_Leave_1796639" transform="translate(-4 -4)">
        <g id="Groupe_91" data-name="Groupe 91" transform="translate(4 4)">
          <path id="Tracé_1398" data-name="Tracé 1398" d="M23.044,26.286A1.411,1.411,0,0,0,21.5,27.555a3.785,3.785,0,0,1-2.314,3.158,25.422,25.422,0,0,1-9.633,0,3.766,3.766,0,0,1-2.329-3.149,95.739,95.739,0,0,1,0-17.122A3.782,3.782,0,0,1,9.531,7.288a25.413,25.413,0,0,1,9.632,0,3.78,3.78,0,0,1,2.333,3.16,1.417,1.417,0,0,0,2.82-.273C24.05,7.456,21.963,4.914,19.643,4.5a28.139,28.139,0,0,0-10.592,0c-2.3.409-4.39,2.951-4.656,5.678a98.41,98.41,0,0,0,0,17.645c.265,2.716,2.354,5.258,4.671,5.671a31.815,31.815,0,0,0,5.284.5,31.982,31.982,0,0,0,5.31-.5c2.3-.411,4.388-2.953,4.654-5.669a1.413,1.413,0,0,0-1.272-1.542" transform="translate(-4 -4)" fill="#020b5d" fill-rule="evenodd"/>
          <path id="Tracé_1399" data-name="Tracé 1399" d="M32.761,15.358a1.256,1.256,0,0,0,.036-.183s0,0,0-.008a1.426,1.426,0,0,0-.119-.554,14.238,14.238,0,0,0-4.631-5.8,1.418,1.418,0,1,0-1.769,2.217,13.371,13.371,0,0,1,2.694,2.754l-17.927.146a1.418,1.418,0,0,0,.011,2.836h.009l17.552-.144a13.05,13.05,0,0,1-2.5,2.027,1.418,1.418,0,0,0,1.467,2.427,13.4,13.4,0,0,0,5.089-5.323c0-.006,0-.009,0-.015a1.431,1.431,0,0,0,.079-.376" transform="translate(0.896 -0.048)" fill="#020b5d" fill-rule="evenodd"/>
        </g>
      </g>
    </svg>
    <p>Se Déconnecter</p>
    </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display:none">
          @csrf
      </form>

  </div>


  <div class="info">
    <p class="titre">Votre Compte</p>
    <div class="imgUser">
      <img class="imagepp" src="images/user.jpg"/>
    </div>

    <p class="name">{{ $user->firstname }}<span class="orange">{{ $user->surname }}</span></p>
    <hr class="separation">
    <p class="tel">{{ join('.', str_split($user->phonenumber, 2)) }}</p>
    <hr class="separation">
    <p class="mail">{{ explode('@', $user->email)[0] }}<span class="orange">@</span>{{ explode('@', $user->email)[1] }}</p>
  </div>


</div>
@endsection
