@extends('errors::minimal')

@section('title', __('Bad Request'))
@section('code', '400')

@if($exception->getMessage())
@section('message', $exception->getMessage())
@else
@section('message', __('Metode Tidak Diperbolehkan'))
@endif
