@extends('layouts.app')

@section('content')

<b-container fluid>
    <b-row>
        <b-col cols="4">
            <contact-list-component></contact-list-component>          
        </b-col>
        <b-col cols="8">
            <active-conversation-component></active-conversation-component>
        </b-col>
    </b-row>
</b-container>

@endsection
