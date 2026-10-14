@extends('admin.layout')
@section('title','Messages')
@section('content')
<div class="mb-4"><h1>Messages</h1><p class="text-secondary">Contact enquiries submitted through the website.</p></div>
<div class="admin-card"><div class="table-responsive"><table class="table align-middle mb-0"><thead><tr><th>Sender</th><th>Subject</th><th>Status</th><th>Date</th><th></th></tr></thead><tbody>@forelse($messages as $message)<tr class="{{ !$message->is_read?'fw-semibold':'' }}"><td>{{ $message->name }}<div class="small text-secondary">{{ $message->email }}</div></td><td>{{ $message->subject }}</td><td><span class="badge {{ $message->is_read?'text-bg-secondary':'text-bg-primary' }}">{{ $message->is_read?'Read':'New' }}</span></td><td>{{ $message->created_at->format('d M Y, H:i') }}</td><td class="text-end"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.messages.show',$message) }}">Open</a></td></tr>@empty<tr><td colspan="5" class="text-center py-5">No messages received yet.</td></tr>@endforelse</tbody></table></div><div class="p-3">{{ $messages->links() }}</div></div>
@endsection
