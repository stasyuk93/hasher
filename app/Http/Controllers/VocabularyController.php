<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hasher;
use App\Models\Word;
use App\Models\Hash;
use Illuminate\Support\Facades\Storage;

class VocabularyController extends Controller
{

    public function indexJson(Request $request)
    {
        $vocabulary = $request->user()->hashWords()->with('word', 'hash')->get();
        $response = [];
        foreach ($vocabulary as $item){
            $response[] = [
                'word' => $item->word->word,
                'hash' => $item->hash,
                'algorithm' => $item->getRelation('hash')->name,
            ];
        }
        return response()->json($response);
    }

    public function getXml()
    {
        return response(Storage::get('public/users.xml'))->header('Content-type', 'text/xml');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function hasher(Request $request)
    {
        $vocabulary = $request->get('vocabulary');
        foreach ($vocabulary as &$item){
            if(isset($item['algorithm']) && !empty($item['word'])) {
                $item['hash'] = Hasher::generateHash($item['word'], $item['algorithm']);
            }
        }
        return response()->json($vocabulary);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $vocabulary = $request->user()->hashWords()->with('word', 'hash')->get();

        return view('vocabulary.index', compact('vocabulary'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $algorithms = Hasher::getHashAlgorithmList();

        return view('vocabulary.create', compact('algorithms'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $vocabulary = $request->get('vocabulary');
        $user = $request->user();
        foreach ($vocabulary as $item){
            if(empty($item['word']) || empty($item['algorithm'])) continue;
            if(empty($item['hash'])) $item['hash'] = Hasher::generateHash($item['word'], $item['algorithm']);
            $word = Word::firstOrCreate(['word' => $item['word']]);
            $hash = Hash::where('name', $item['algorithm'])->first();
            $hashWord = $word->hashWord()->firstOrCreate(['hash_id' => $hash->id],['hash' => $item['hash']]);
            $user->hashWords()->syncWithoutDetaching($hashWord->id);
        }
        return redirect()->route('vocabulary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
