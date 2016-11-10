@extends('layouts.app')

@section('content')

    <section class="ui centered grid" id="startVueApp">

        <div class="ten wide column">

            <example></example>

        </div>

        <div class="ten wide column">

            <passport-clients></passport-clients>

        </div>

        <div class="ten wide column">

            <passport-authorized-clients></passport-authorized-clients>

        </div>

        <div class="ten wide column">

            <passport-personal-access-tokens></passport-personal-access-tokens>

        </div>

    </section>

@endsection
