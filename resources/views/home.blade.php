@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('status'))
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Alert
                    </div>

                    <div class="panel-body">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if($globalAnnounce != null)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Global: {{ $globalAnnounce->title }}
                        </div>
                        <div class="panel-body">
                            {!! $globalAnnounce->body !!}
                        </div>
                        <div class="panel-footer">
                            {{ $globalAnnounce->account->username }} posted this on {{ $globalAnnounce->updated_at }}
                            @can('GlobalGM', $active)
                            <a href="/gm/announce/{{ $globalAnnounce->id }}/delete" class="btn-danger btn
                                pull-right">Delete</a>
                            <a href="/gm/announce/{{ $globalAnnounce->id }}/edit" class="btn-info btn pull-right">Edit</a>
                            <div class="clearfix"></div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
    @endif
    @if($realmAnnounce != null)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Realm: {{ $realmAnnounce->title }}
                    </div>
                    <div class="panel-body">
                        {!! $realmAnnounce->body !!}
                    </div>
                    <div class="panel-footer">
                        {{ $realmAnnounce->account->username }} posted this on {{ $realmAnnounce->updated_at }}
                        @can('GM', $active)
                        <a href="/gm/announce/{{ $realmAnnounce->id }}/delete" class="btn-danger btn
                            pull-right">Delete</a>
                        <a href="/gm/announce/{{ $realmAnnounce->id }}/edit" class="btn-info btn pull-right">Edit</a>
                        <div class="clearfix"></div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                   {{ $active->name }}
                </div>

                <div class="panel-body">
                    @forelse ($chars as $char)
                        [{{ $char->level }}] {{ $char->name }}
                        ({{ $char->gender }} {{ $char->race }} {{ $char->class }})
                        [<a href="/hearth/{{ $char->guid}}">Hearth</a>]
                        <br>
                    @empty
                        You have no characters on this realm.
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @can('Admin', $active)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Admin Tools
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <a href="/admin/realms" class="btn btn-info">Manage Realms</a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="/admin/permissions" class="btn btn-info">Manage Permissions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('GM', $active)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        GM Tools
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <a href="/gm/announce" class="btn btn-info">Manage Announcements</a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="/gm/bans" class="btn btn-info">Manage Bans</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @can('Moderator', $active)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Moderator Tools
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <a href="/mod/pending" class="btn btn-info">Manage Pending Actions</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
@endsection
