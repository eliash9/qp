<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Room;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\User;
use App\Models\QueueParticipant;
use Carbon\Carbon;

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
            $user_id = auth()->user()->id;
            $latestParticipant = QueueParticipant::where('user_id', $user_id)
                ->latest() // Order by created_at in descending order
                ->first(); // Retrieve the latest record
          
            if($latestParticipant){
                $room = Room::where([['id', $latestParticipant->room_id], ['is_active', 0]])->first();
                if($room){
                    return redirect()->route('pelajar.room', $room->code)->withSuccess('Berhasil masuk');
                }
               
            }
            
            // Now, $latestParticipant contains the latest record for the user
            return view('pelajar.index', ['stand' => $stand]);


    }



    public function enter_room(Request $request)
    {
        $room = Room::where([['code', $request->code], ['is_active', 0]])->first();

        if ($room) {
            // Tambahkan pengguna sebagai peserta antrian
            QueueParticipant::create([
                'user_id' => auth()->user()->id,
                'room_id' => $room->id,
            ]);

            return redirect()->route('pelajar.room', $room->code)->withSuccess('Berhasil masuk');
        }

        return redirect()->back()->withError('Room tidak ditemukan');
    }

    public function enter_room2(Request $request)
    {
        $enter = Room::where([['code', $request->code], ['is_active', 1]])->first();
        // dd($enter);
        if ($enter) {


            $enter->push('peserta', auth()->user()->username);


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

        $active = $detail->is_active;

        // $roomParticipants = QueueParticipant::where('room_id', $room->id)->get();
        $roomParticipants = QueueParticipant::where('room_id', $room->id)
            ->join('users', 'queue_participants.user_id', '=', 'users.id')
            ->select('users.name')
            ->get();


        $existingAnswer = Answer::where([

            'id_room' => $room->id,
            'id_user' => auth()->user()->id,
        ])->first();
        if ($existingAnswer) {

            return redirect()->back()->withError('Anda Sudah menyelesaikannya!');
        } else {


            return view('pelajar.room', ['active' => $active, 'detail' => $detail, 'quizzes' => $quizzes, 'roomParticipants' => $roomParticipants]);
        }
    }

    public function play($id)
    {
        $link = Room::where('code', $id)->firstOrFail();
        $name = Room::findOrFail($link->id);
        $quizzes = Quiz::where([['id_room', $name->id]])->get();
        // dd($room);

        $existingAnswer = Answer::where([
          
            'id_room' => $name->id,
            'id_user' => auth()->user()->id,
        ])->first();

        if($existingAnswer){
            return redirect()->route('pelajar.done', $link)->withSuccess('Berhasil masuk');
        }


        return view('pelajar.room_post', ['quizzes' => $quizzes, 'name' => $name, 'link' => $link]);
    }

    public function answer_save(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $participants = QueueParticipant::where('room_id', $room->id)->get();

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

                if ($score === 1) {
                    /*
                     $scoring = (1 - ($score / $participants->count()));//partisipan count
                    if ($scoring <= 0.5) {
                        $scoring += rand(0.3, 0.5);
                    }
                    */
                    $score = 1500; //($scoring * 1000) + rand(1, 99);

                } else {
                    $score = -200;
                }

                $endTime = now();
                $startTime = Carbon::parse($room->start);
                $endTime = Carbon::parse($endTime);
                $durationInSeconds = $endTime->diffInSeconds($startTime);


                $scoref = $score - $durationInSeconds;


                if ($existingAnswer) {
                    // Update the existing answer
                    $existingAnswer->update([
                        'answer' => $answer,
                        'score' => $scoref,
                        'desc' => $desc,
                        'created_at' => $room->start,
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
                        'score' => $scoref,
                        'desc' => $desc,
                        'created_at' => $room->start,
                        'duration' => $durationInSeconds,
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

        return view('pelajar.standing', [
            'link' => $link, 'stand' => $stand, 'room' => $room->room,
            'firstPlace' => $firstPlace,
            'secondPlace' => $secondPlace,
            'thirdPlace' => $thirdPlace
        ]);
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
            'firstPlace' => $firstPlace,
            'secondPlace' => $secondPlace,
            'thirdPlace' => $thirdPlace
        ]);
    }
}
