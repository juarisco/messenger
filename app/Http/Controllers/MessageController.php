<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        return Message::select(
            'id',
            DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as written_by_me"),
            'created_at',
            'content'
        )->get();
    }
}
