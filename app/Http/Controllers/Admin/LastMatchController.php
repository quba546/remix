<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\LastMatchRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class LastMatchController extends Controller
{
    private LastMatchRepositoryInterface $lastMatchRepository;

    public function __construct(LastMatchRepositoryInterface $lastMatchRepository)
    {
        $this->lastMatchRepository = $lastMatchRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() : View
    {
        return view('admin.last-match',
            [
                'lastMatch' => $this->lastMatchRepository->getLastMatch()[0]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) : RedirectResponse
    {
        $this->lastMatchRepository->saveLastMatch(
            [
                'host' => $request->get('host'),
                'guest' => $request->get('guest'),
                'matchType' => $request->get('matchType'),
                'round' => $request->get('round') ?? null,
                'date' => $request->get('date'),
                'score' => $request->get('score'),
            ]
        );

        return redirect()->route('admin.matches.last.edit')->with('success', 'Poprawnie dodano dane o ostatnim meczu');
    }
}
