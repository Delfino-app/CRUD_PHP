@extends('errors::illustrated-layout')

@section('title', __('Acesso Proíbido'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Acesso Proíbido'))
