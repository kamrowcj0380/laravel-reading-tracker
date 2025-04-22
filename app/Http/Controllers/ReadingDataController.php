<?php

namespace App\Http\Controllers;

use App\Models\ReadingData;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReadingDataController extends Controller
{

    public function loadDashboard() {
        $allReadingData = ReadingData::where('user_id', auth()->id())->get();
        foreach ($allReadingData as $readingData) {
            $readingData['read-status'] = 'Pages Read:'.(string)$readingData['pages_read']."/".(string)$readingData['pages_in_book'];
            if ($readingData['pages_read'] == $readingData['pages_in_book']) {
                $readingData['status-color'] = 'green';
            }
            elseif ($readingData['pages_read'] > 0) {
                $readingData['status-color'] = 'orange';
            }
            else {
                $readingData['status-color'] = 'red';
            }
        }
        return view('home', ['allReadingData' => $allReadingData]);
    }

    public function showUpdateScreen(ReadingData $readingData) {
        if (auth()->user()->id !== $readingData['user_id']) {
            return redirect('/');
        }
        return view('update-reading', ['readingData' => $readingData]);
    }

    public function deleteReading(ReadingData $readingData) {
        if (auth()->user()->id == $readingData['user_id']) {
            $readingData->delete();
        }

        return redirect('/');
    }

    public function updateReading(ReadingData $readingData, Request $request) {
        if (auth()->user()->id !== $readingData['user_id']) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages_read' => ['required', 'integer', 'max:9999999'],
            'pages_in_book' => ['required', 'integer', 'max:9999999']
        ]);

        $readingData->update($incomingFields);
        return redirect('/');

    }

    public function addReading(Request $request) {
        $incomingFields = $request->validate([
            'title' => ['required', Rule::unique('reading_data', 'title')],
            'author' => 'required',
            'pages_in_book' => ['required', 'integer', 'max:9999999']
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['pages_in_book'] = strip_tags($incomingFields['pages_in_book']);

        $incomingFields['user_id'] = auth()->id();
        //assume that they haven't started yet. They can update this themselves for now. AAAAATODO - feature to add
        $incomingFields['pages_read'] = 0;

        ReadingData::create($incomingFields);

        return redirect('/');
    }

}
