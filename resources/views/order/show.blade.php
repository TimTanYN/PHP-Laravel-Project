<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
@extends('order.layout')
@section('content')
<div class="card">
  <div class="card-header">Order Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Order ID : {{ $order->order_id }}</h5>
        <p class="card-text">Customer ID : {{ $order->customer_id }}</p>
        <p class="card-text">Date and time : {{ $order->datetime }}</p>
        <p class="card-text">Total : {{ $order->total }}</p>
        <p class="card-text">Payment Method : {{ $order->paymentMethod }}</p>
        <p class="card-text">Status : {{ $order->status }}</p>
  </div>
      
    </hr>
  
  </div>
</div>
