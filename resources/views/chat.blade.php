<!-- resources/views/chat.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Chats</div>
            <div class="card-body">
                <chat-messages :messages="messages"></chat-messages>
                <div id="getmessage">


                </div>
            </div>
            {{--  <input id="typingInput">  --}}
            <div class="card-footer">
                <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
            </div>

        </div>
    </div>
@endsection
{{--  @section('scripts')
    < script src = "{{ mix('js/app.js') }}">
        </script>

        <script>
            window.Echo.private('chat')
                .listen('MessageSent', (e) => {
                    const message = e.message.message;
                    // تحديث واجهة المستخدم بالرسالة الجديدة
                    document.getElementById('getmessage').innerHTML= "HELLO WORD";
                });
        </script>
    @endsection  --}}
<script>
   
</script>
