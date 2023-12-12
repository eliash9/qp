<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;

use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $room = Room::all();
        return view('guru.index', ['room' => $room]);
    }

    public function users()
    {
       
        // return view('your-page', compact('menuItems'));
        $room = User::all();
        return view('user.index', ['room' => $room]);
    }

    public function user_delete($id)
    {
        $delete = User::findOrFail($id)->delete();
        return redirect('/guru/user')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function changeRole(Request $request, User $user)
    {
        $user->update(['role' => $request->role]);

        return redirect()->back()->with('success', 'Role updated successfully');
    }


    public function add_room()
    {
        return view('guru.room_add');
    }

    public function save_room(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'room' => 'required',
        ]);

        try {
            $data = new Room;
            $data->room = $request->room;
            $data->code = $request->code;
            $data->is_active = 1;
            $data->save();
            // dd($data);

            Session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/guru/room_add');
        } catch (\Exception $e) {
            Session()->flash('alert-danger', $e->getMessage());
            return redirect('/guru/room_add')->withInput();
        }
    }

    public function delete_room($id)
    {
        $delete = Room::findOrFail($id)->delete();
        return redirect('/guru')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function detail_room($id)
    {
        $detail = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
        $quizzes = Quiz::where([['id_room', $room->id]])->get();
        // dd($room);
        return view('guru.room', ['quizzes' => $quizzes, 'detail' => $detail]);
    }

    public function add_quiz($id)
    {
        $link = Room::where('id', $id)->firstOrFail();
        // dd($link->id);
        return view('guru.quiz_add', ['link' => $link]);
    }

    public function save_quiz(Request $request, Room $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'key' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('quiz', $imageName);
        } else {
            $imageName = '';
        }

        try {
            $data = new Quiz;
            $data->id_room = $id->id;
            $data->question = $request->question;
            $data->a = $request->a;
            $data->b = $request->b;
            $data->c = $request->c;
            $data->d = $request->d;
            $data->key = $request->key;
            $data->image = $imageName;
            $data->save();
            // dd($data);

            Session()->flash('alert-success', 'Data berhasil disimpan');
            return redirect('/guru/room/' . $id->id . '/quiz_add');
        } catch (\Exception $e) {
            Session()->flash('alert-danger', $e->getMessage());
            return redirect('/guru/room/' . $id->id . '/quiz_add')->withInput();
        }
    }

    public function edit_quiz($detail, $quizzes)
    {
        $edit = Quiz::findOrFail($quizzes);
        $link = Room::where('id', $detail)->firstOrFail();
        return view('guru.quiz_edit', ['edit' => $edit, 'link' => $link]);
    }

    public function update_quiz(Request $request, $detail, $quizzes)
    {
        $edit = Quiz::findOrFail($quizzes);
        $link = Room::where('id', $detail)->firstOrFail();

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('quiz', $imageName);
        } else {
            $imageName = $edit->gambar;
        }
        $edit->update([
            'image' => $imageName,
            'question' => $request->question,
            'a' => $request->a,
            'b' => $request->b,
            'c' => $request->c,
            'd' => $request->d,
            'key' => $request->key,
        ]);
        return redirect('/guru/room/' . $link->id)->with('alert-success', 'Data berhasil diubah dan disimpan');
    }

    public function delete_quiz($detail, $quizzes)
    {
        $delete = Quiz::findOrFail($quizzes)->delete();
        return redirect('/guru/room/' . $detail)->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function stand($id)
    {
        $link = Room::where('id', $id)->firstOrFail();
        $room = Room::findOrFail($id);
        $stand = Answer::where([['id_room', $room->id]])
            ->orderBy('total', 'desc')
            ->groupBy('answers.username')
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ]);
        $quizzes = Quiz::where([['id_room', $room->id]])->get();
        // dd($stand);

        return view('guru.standing', ['link' => $link, 'stand' => $stand, 'quizzes' => $quizzes]);
    }

    public function rangk()
    {
        
      //  $link = Room::where('id','1')->firstOrFail();
      //  $room = Room::findOrFail('1');
        $stand = Answer::groupBy('answers.username')
            ->orderBy('total', 'desc')
           // ->groupBy('answers.username')
            ->get([
                'username',
                Answer::raw('sum(score) as total')
            ]);
        $quizzes = Quiz::all();
        // dd($stand);

        return view('guru.rangking', [ 'stand' => $stand, 'quizzes' => $quizzes]);
    }

    public function generateCodeForRoom($roomId)
    {
        $randomCode = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT); // Generates a random 6-digit code


        $ubah = Room::where('id', $roomId)->update(['code' => $randomCode]);
        return redirect('/guru')->with(['success' => 'Data Berhasil Diubah!']);



    }



}
