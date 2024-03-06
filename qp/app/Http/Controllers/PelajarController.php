<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Room;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\User;

class PelajarController extends Controller
{
    public function index()
    {
        $stand = Answer::groupBy('answers.username')
            ->orderBy('total', 'desc')
            //->groupBy('answers.username')
            ->limit(5)
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ]);
        return view('pelajar.index', ['stand' => $stand]);
    }

    public function enter_room(Request $request)
    {
        $enter = Room::where([['code', $request->code], ['is_active', 1]])->first();
        // dd($enter);
        if ($enter) {
            return redirect()->route('pelajar.room', $enter->code)->withSuccess('Berhasil masuk');
        }
        return redirect()->back()->withError('Room tidak ditemukan');
    }

    public function room($id)
    {
        // dd($id);


        $detail = Room::where('code', $id)->firstOrFail();
        $room = Room::findOrFail($detail->id);
        $quizzes = Quiz::where([['id_room', $room->id]])->get();

        $existingAnswer = Answer::where([

            'id_room' => $room->id,
            'id_user' => auth()->user()->id,
        ])->first();
        if ($existingAnswer) {

            return redirect()->back()->withError('Anda Sudah menyelesaikannya!');
        } else {
            return view('pelajar.room', ['detail' => $detail, 'quizzes' => $quizzes]);
        }


    }

    public function play($id)
    {
        $link = Room::where('code', $id)->firstOrFail();
        $name = Room::findOrFail($link->id);
        $quizzes = Quiz::where([['id_room', $name->id]])->get();
        // dd($room);
        return view('pelajar.room_post', ['quizzes' => $quizzes, 'name' => $name, 'link' => $link]);
    }

    public function answer_save(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $this->validate($request, [
            'answer' => 'required',
            'answer.*' => 'required',
        ]);

        foreach ($request->answer as $key => $answer) {
            $quiz = Quiz::find($key);

            if ($quiz) {
                $existingAnswer = Answer::where([
                    'id_quiz' => $quiz->id,
                    'id_room' => $room->id,
                    'id_user' => auth()->user()->id,
                ])->first();

                $score = ($quiz->key == $answer) ? 1 : 0;
                $desc = ($score == 1) ? 'benar' : 'salah';

                if ($existingAnswer) {
                    // Update the existing answer
                    $existingAnswer->update([
                        'answer' => $answer,
                        'score' => $score,
                        'desc' => $desc,
                    ]);
                } else {
                    // Create a new answer
                    Answer::create([
                        'id_quiz' => $quiz->id,
                        'question' => $quiz->question,
                        'id_room' => $room->id,
                        'id_user' => auth()->user()->id,
                        'username' => auth()->user()->username,
                        'answer' => $answer,
                        'score' => $score,
                        'desc' => $desc,
                    ]);
                }
            }
        }


        return redirect()->route('pelajar.done', $room)->withSuccess('Berhasil masuk');
    }

    public function done($id)
    {
        $done = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
        $table = Answer::where([['id_room', $room->id], ['id_user', auth()->user()->id]])->get();
        return view('pelajar.done', ['done' => $done, 'table' => $table]);
    }

    public function stand($id)
    {
        $link = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
       /*
        $stand = Answer::where([['id_room', $room->id]])
            ->orderBy('total', 'desc')
            ->groupBy('answers.username')
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ]);
        // dd($stand);

        */
        $stand = Answer::where([['id_room', $room->id]])
    ->join('users', 'answers.username', '=', 'users.username')
    ->orderBy('total', 'desc')
    ->groupBy('answers.username', 'users.email', 'users.avatar')
    ->get([
        'answers.username',
        'users.email',
        'users.avatar',
        Answer::raw('sum(score) as total')
    ]);
 
         // Query for the first position
         $firstPlace = Answer::where([['id_room', $room->id]])
         ->groupBy('answers.username')
         ->orderBy('total', 'desc')
         ->take(1)
         ->get([
             'username',
             Answer::raw('sum(score) as total')
         ])->first();

     // Query for the second position
     $secondPlace = Answer::where([['id_room', $room->id]])
     ->groupBy('answers.username')
         ->orderBy('total', 'desc')
         ->skip(1)
         ->take(1)
         ->get([
             'username',
             Answer::raw('sum(score) as total')
         ])->first();

     // Query for the third position
     $thirdPlace = Answer::where([['id_room', $room->id]])
     ->groupBy('answers.username')
         ->orderBy('total', 'desc')
         ->skip(2)
         ->take(1)
         ->get([
             'username',
             Answer::raw('sum(score) as total')
         ])->first();

        return view('pelajar.standing', ['link' => $link, 'stand' => $stand, 'room' => $room->room,
        'firstPlace' =>$firstPlace,
        'secondPlace'=>$secondPlace,
        'thirdPlace'=> $thirdPlace]);
    }

    public function rangk()
    {
        //  $link = Room::where('id', $id)->firstOrFail();
        //  $room = Room::findOrFail($id);
        $stand = Answer::join('users', 'answers.username', '=', 'users.username')
        ->groupBy('answers.username', 'users.email', 'users.avatar')
        ->orderByDesc(Answer::raw('sum(score)')) // Use orderByDesc for descending order
        ->select([
            'answers.username',
            'users.email',
            'users.avatar',
            Answer::raw('sum(score) as total'),
            Answer::raw("CASE
                WHEN sum(score) >= 90 THEN 'Sangat Baik'
                WHEN sum(score) >= 70 THEN 'Baik'
                WHEN sum(score) >= 50 THEN 'Cukup'
                ELSE 'Kurang'
            END as description")
        ])
        ->get();
    
        // dd($stand);


        // Query for the first position
        $firstPlace = Answer::groupBy('answers.username')
            ->orderBy('total', 'desc')
            ->take(1)
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ])->first();

        // Query for the second position
        $secondPlace = Answer::groupBy('answers.username')
            ->orderBy('total', 'desc')
            ->skip(1)
            ->take(1)
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ])->first();

        // Query for the third position
        $thirdPlace = Answer::groupBy('answers.username')
            ->orderBy('total', 'desc')
            ->skip(2)
            ->take(1)
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ])->first();

        // Now $firstPlace, $secondPlace, and $thirdPlace contain the data for the first, second, and third positions, respectively.





        return view('pelajar.rangking', [
            'stand' => $stand,
            'firstPlace' =>$firstPlace,
            'secondPlace'=>$secondPlace,
            'thirdPlace'=> $thirdPlace
        ]);
    }
}