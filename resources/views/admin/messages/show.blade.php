@extends('admin.layout')
@section('title','Message')
@section('content')
<div class="mb-4"><a href="{{ route('admin.messages.index') }}" class="text-decoration-none">← Back to messages</a></div>
<div class="admin-card p-4"><div class="d-flex justify-content-between flex-wrap gap-3"><div><span class="badge text-bg-primary mb-2">{{ $message->subject }}</span><h2>{{ $message->name }}</h2><p class="text-secondary mb-0">{{ $message->email }} @if($message->phone) · {{ $message->phone }} @endif</p></div><small class="text-secondary">{{ $message->created_at->format('d M Y, H:i') }}</small></div><hr><p class="message-body">{{ $message->message }}</p><div class="mt-4"><a class="btn btn-primary" href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}">Reply by Email</a><form class="d-inline" method="POST" action="{{ route('admin.messages.destroy',$message) }}">@csrf @method('DELETE')<button class="btn btn-outline-danger" onclick="return confirm('Delete this message?')">Delete</button></form></div></div>
@endsection
