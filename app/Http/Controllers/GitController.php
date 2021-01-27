<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserGit;
use Illuminate\Http\Request;

class GitController extends Controller
{
    public function Home($result = [], $repo = [])
    {

        if (!empty($result)) {
            $result = $result;
            $repo = $repo;
        }

        return view('git.home', ['user' => $result, 'repo' => $repo]);
    }

    public function UserGit(UserGit $request)
    {
        $iniciar = curl_init();

        curl_setopt($iniciar, CURLOPT_URL, "https://api.github.com/users/" . $request->user);

        curl_setopt($iniciar, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'charset=UTF-8 ', 
        'X-Requested-With: XMLHttpRequest', 'User-Agent:request'));

        
        curl_setopt($iniciar, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

        $result = json_decode(curl_exec($iniciar));

        curl_close($iniciar);

        return $this->repoGit($result, $request->user);

    }

    private function repoGit ($result, $user) {
        $iniciar = curl_init();

        curl_setopt($iniciar, CURLOPT_URL, "https://api.github.com/users/" . $user . "/repos");

        curl_setopt($iniciar, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'charset=UTF-8 ', 
        'X-Requested-With: XMLHttpRequest', 'User-Agent:request'));

        
        curl_setopt($iniciar, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($iniciar, CURLOPT_RETURNTRANSFER, true);

        $resultado = json_decode(curl_exec($iniciar));

        curl_close($iniciar);

        
        return $this->Home($result, $resultado);

    }
    
}
