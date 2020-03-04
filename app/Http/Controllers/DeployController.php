<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeployController extends Controller
{
    public function deploy(Request $request) {
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');

        // Transform to json (php array)
        $json = json_decode($githubPayload, true);

        $branch = $json['pull_request']['base']['ref'];

        // Only if pull request is to test branch
        if ($branch == 'test') {
            $localToken = config('app.deploy_secret');
            $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
    
            if (hash_equals($githubHash, $localHash)) {
                $root_path = base_path();
                $process = new Process('cd ' . $root_path . '; ./deploy.sh');
                $process->run(function ($type, $buffer) {
                    echo $buffer;
                });
            }
        }
    }
}
