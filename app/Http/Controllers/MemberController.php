<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    // FUNCION QUE MUESTRA MIEMBROS
    public function allMembers()
    {
        $members = Member::all();
        return response()->json($members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // FUNCION QUE CREA NUEVO MIEMBRO
    public function newMember(Request $request)
    {
        $member = Member::where([
            ['user_id', '=', $request->user_id],
            ['party_id', '=', $request->party_id],
        ])->first();
        if ($member != null) {
            return response()->json(['message' => 'Member already exists in this partie'], 400);
        } else {
            $member = new Member;
            $member->user_id = $request->user_id;
            $member->party_id = $request->party_id;
            $member->save();
            return response()->json($member);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  
    // FUNCION QUE BORRA MIEMBRO POR ID....OK
    public function deleteMember($id)
    {
        $member = Member::find($id);
        $member->delete();
        return response()->json($member);
    }
}
