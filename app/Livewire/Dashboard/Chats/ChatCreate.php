<?php

namespace App\Livewire\Dashboard\Chats;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCreate extends Component
{
    public $users;
    public $message = 'Pesan permulaan.';

/*     public function checkConversation($receiver_id)
    {
        // dd(User::find($receiver_id));
        $checkedConversation = Conversation::where('receiver_id', \auth()->user()->id)
            ->where('sender_id', $receiver_id)
            ->orWhere('receiver_id', $receiver_id)
            ->orWhere('sender_id', \auth()->user()->id)->get();

        if (count($checkedConversation) == 0) {
            // dd('no conversation');
            // Make conversation
            $createdConversation = Conversation::create([
                'receiver_id' => $receiver_id,
                'sender_id' => \auth()->user()->id,
                'last_time_message' => now(),
            ]);

            // Create Message
            $createdMessage = Message::create([
                'conversation_id' => $createdConversation->id,
                'sender_id' => \auth()->user()->id,
                'receiver_id' => $receiver_id,
                'body' => $this->message,
            ]);
            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();
            $this->dispatch('refresh')->to(ChatList::class);
            // dd('saved', $createdConversation, $createdMessage);

        } elseif (count($checkedConversation) >= 1) {
            // Make conversation
            $createdConversation = Conversation::create([
                'receiver_id' => $receiver_id,
                'sender_id' => \auth()->user()->id,
                'last_time_message' => now(),
            ]);

            // Create Message
            $createdMessage = Message::create([
                'conversation_id' => $createdConversation->id,
                'sender_id' => \auth()->user()->id,
                'receiver_id' => $receiver_id,
                'body' => $this->message,
            ]);
            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();
            $this->dispatch('refresh')->to(ChatList::class);
        }
    }
 */
    public function checkConversation($receiver_id)
    {
        // Mengecek apakah sudah ada Conversation yang sesuai
        $existingConversation = Conversation::where(function ($query) use ($receiver_id) {
            $query->where('receiver_id', \auth()->user()->id)
                ->where('sender_id', $receiver_id);
        })->orWhere(function ($query) use ($receiver_id) {
            $query->where('receiver_id', $receiver_id)
                ->where('sender_id', \auth()->user()->id);
        })->first();

        // Jika tidak ada Conversation yang sesuai, maka buat satu
        if (!$existingConversation) {
            $createdConversation = Conversation::create([
                'receiver_id' => $receiver_id,
                'sender_id' => \auth()->user()->id,
                'last_time_message' => now(),
            ]);

            // $createdMessage = Message::create([
            //     'conversation_id' => $createdConversation->id,
            //     'sender_id' => \auth()->user()->id,
            //     'receiver_id' => $receiver_id,
            //     'body' => $this->message,
            // ]);
            // $createdConversation->last_time_message = $createdMessage->created_at;

            $createdConversation->last_time_message = $createdConversation->created_at;
            $createdConversation->save();

            $this->dispatch('refreshList')->to(ChatList::class);
            sleep(1);
            $this->dispatch('chatUserSelected', $createdConversation, $createdConversation->receiver_id)->to(ChatList::class);
            // $this->dispatch('chatUserSelected', $createdConversation, $createdConversation->receiver_id)->to(ChatList::class);
        } else {
            // Jika ada Conversation yang sesuai, Anda bisa melakukan aksi lain atau menambah pesan ke Conversation yang sudah ada
            $this->dispatch('chatUserSelected', $existingConversation, $existingConversation->receiver_id)->to(ChatList::class);
        }
    }


    #[On('refresh')]
    public function render()
    {
        // Daftar User selain diri yang login.
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
        return view('livewire.dashboard.chats.chat-create');
    }
}
