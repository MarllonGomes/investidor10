@extends('layouts.admin')

@section('title', 'Gerenciador de Notícias')

@section('content')
    <h1 class="page-title">Gerenciados de Notícias</h1>
    @livewire('admin-articles-add')
    @livewire('admin-articles-list')
@endsection