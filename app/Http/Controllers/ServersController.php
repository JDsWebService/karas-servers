<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServersController extends Controller
{

    // Public Facing Server Status Page
    public function status() {
        return view('servers.status');
    }

    // Public Facing Server Rules Index Page
    public function rulesIndex() {
        return view('servers.rules.index');
    }

    // Public Facing Server Rules English Page
    public function rulesEnglish() {
        return view('servers.rules.english');
    }

    // Public Facing Server Rules Portuguese Page
    public function rulesPortuguese() {
        return view('servers.rules.portuguese');
    }

    // Public Facing Server Rules Spanish Page
    public function rulesSpanish() {
        return view('servers.rules.spanish');
    }

    // Public Facing Server Rules German Page
    public function rulesGerman() {
        return view('servers.rules.german');
    }

    // Public Facing Server Rules Korean Page
    public function rulesKorean() {
        return view('servers.rules.korean');
    }

    // Public Facing Server Rules Japanese Page
    public function rulesJapanese() {
        return view('servers.rules.japanese');
    }
}
