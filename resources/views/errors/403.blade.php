@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')

@if($exception->getMessage())
@section('message', $exception->getMessage())
@else
@section('message', __('Forbidden'))
@endif
