@extends('layouts/web/master')

<?php $title = 'Java Script' ?>

@section('style')
 {{ HTML::style('public/css/content/js-satu.css') }}
@stop

@section('script')
 {{ HTML::script('public/js/js1.js') }}
@stop

@section('content')
<div class="isi">
 <h4>Belajar java script 1</h4>
 <br>
 <label>Hide and Show</label>
 <ul>
  <a href="#" style="display: none;" class="dropdownHide" onclick="dropdownHide(this,event)">Dropdown Link</a>
  <a href="#" class="dropdownShow" onclick="dropdownShow(this,event)">Dropdown Link</a>
  <ul style="display: none;" class="dropdown">
   <li>Test 1</li>
   <li>Test 2</li>
   <li>Test 3</li>
  </ul>
 </ul>
</div>
@stop