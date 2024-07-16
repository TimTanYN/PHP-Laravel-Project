<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
@extends('customer.customerLayout')
@section('content')
<div class="card">
  <div class="card-header">Customer Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Customer ID : {{ $customer->customer_id }}</h5>
        <p class="card-text">Email : {{ $customer->email }}</p>
        <p class="card-text">Password : {{ $customer->password }}</p>
        <p class="card-text">Phone : {{ $customer->phone }}</p>
        <p class="card-text">Name : {{ $customer->name }}</p>
        <p class="card-text">Gender : {{ $customer->gender }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
