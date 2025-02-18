@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <!-- Chat Box -->
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Messages</h4>
                </div>
                <div class="card-body">
                    <!-- Messages List -->
                    <div id="message-list" style="height: 400px; overflow-y: auto;">
                        @foreach($messages as $message)
                            <div class="mb-3">
                                <strong>
                                    {{ $message->sender_id == auth()->id() ? 'You' : $message->sender->name }}
                                </strong>:
                                <span>{{ $message->content }}</span>
                                <br>
                                <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <!-- Message Form -->
                    <form id="message-form" action="{{ route('messages.send') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="content" class="form-control" placeholder="Type your message..." required>
                            <input type="hidden" name="receiver_id" value="{{ $receiverId }}">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
