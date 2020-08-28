@extends('layouts.app')

@section('title')
<a href="#!" class="breadcrumb">@lang('admin.admin')</a>
<a href="#!" class="breadcrumb">@lang('admin.permissions')</a>
@endsection

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">@lang('admin.handle_registrations')</span>
                <table>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                <span class="new badge {{ $role->color() }}" data-badge-caption="">{{ $role->name() }}
                                    @if($role->pivot->object_id)
                                        : {{ $role->pivot->object->name }}
                                    @endif
                                </span>
                                @endforeach
                            </td>
                            <!-- TODO: show only for admins! -->
                            <td>
                                <a href="{{ route('admin.permissions.show', $user->id) }}" class="btn-floating waves-effect waves-light right">
                                    <i class="material-icons">send</i>
                                </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection