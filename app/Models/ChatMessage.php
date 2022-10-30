<?php

namespace App\Models;

use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $reportable_object_name = 'chatMessage'; // required by the Reportable trait

    use HasFactory, Reportable;
/*     protected $with = ['user' , 'receiver']; */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function LastMessage()
    {
        return $this->where('conversation_id', $this->conversation_id)->OrderByDesc('created_at')->first();
    }

    public function getConversation($conversation_id)
    {
        return $this->where('conversation_id', $conversation_id)->OrderBy('created_at')->get();
    }
}
