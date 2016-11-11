@extends('layouts.app')

@section('content')

    <section class="ui centered grid" id="startVueApp">

        <div class="twelve wide column">

            <div class="ui segments">

                <example></example>

                <passport-clients></passport-clients>

                <passport-authorized-clients></passport-authorized-clients>

                <passport-personal-access-tokens></passport-personal-access-tokens>

            </div>

        </div>

    </section>

@endsection
