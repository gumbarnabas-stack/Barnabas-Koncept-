@extends('admin.layout')
@section('title','Dashboard')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1>Dashboard</h1>
        <p class="text-secondary mb-0">Manage your website content from one place.</p>
    </div>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Add Project</a>
</div>
<div class="row g-4 mb-5">@foreach([['projects','Portfolio Projects','bi-images'],['services','Services','bi-palette'],['messages','Messages','bi-chat-left-text'],['unread','Unread Messages','bi-envelope-open']] as $item)
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="bi {{ $item[2] }}"></i></div>
            <div><strong>{{ $stats[$item[0]] }}</strong><span>{{ $item[1] }}</span></div>
        </div>
    </div>@endforeach
</div>
<div class="row g-4"><div class="col-lg-7"><div class="admin-card"><div class="card-head"><h5>Recent Messages</h5><a href="{{ route('admin.messages.index') }}">View all</a></div>@forelse($recentMessages as $message)<a class="list-row" href="{{ route('admin.messages.show',$message) }}"><div><strong>{{ $message->name }}</strong><small>{{ $message->subject }}</small></div><small>{{ $message->created_at->diffForHumans() }}</small></a>@empty<p class="text-secondary p-3">No messages yet.</p>@endforelse</div></div>
<div class="col-lg-5"><div class="admin-card"><div class="card-head"><h5>Recent Projects</h5><a href="{{ route('admin.portfolio.index') }}">Manage</a></div>@forelse($recentProjects as $project)<div class="list-row"><div><strong>{{ $project->title }}</strong><small>{{ $project->category }}</small></div><span class="badge {{ $project->is_featured?'text-bg-primary':'text-bg-secondary' }}">{{ $project->is_featured?'Featured':'Project' }}</span></div>@empty<p class="text-secondary p-3">No projects yet.</p>@endforelse</div></div></div>
@endsection
