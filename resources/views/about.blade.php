@extends('layouts.main')
@section('contents')
<h1>About</h1>
<ul>
  <li>Your Name : <?= $name ?></li>
  <li>Email Address : <?= $email ?></li>
</ul>
@endsection