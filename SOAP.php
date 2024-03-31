<?php

// import soap
foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/Assemblies/Roblox/Grid/Rcc/*.php') as $filename) {
    require_once $filename;
}

function isPortUsed($portToCheck)
{
    exec('netstat -an | find "' . $portToCheck . '"', $output);
    if (empty($output)) {
        return false;
    } else {
        return true;
    }
}

function getPlayersInJob($jobId, $port)
{
    $players = 0;

    $scriptText = '
        local players = ""
        for i,v in pairs(game.Players:GetChildren()) do
            if v:IsA("Player") then
                players = players..","..v.Name
            end
        end
        return players
    ';

    $RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", $port);
    if ($RCCServiceSoap instanceof SoapFault) {
        $json = array("Success" => false, "Error" => "SOAP fault occurred", "Value" => 0, "ServicePort" => $port);
        exit(json_encode($json));
    }

    $script = new Roblox\Grid\Rcc\ScriptExecution($jobId . "-Script", $scriptText);
    $value = $RCCServiceSoap->ExecuteEx($jobId, $script);

    if ($value !== null) {
        $players = $value->LuaValue->value;
    }

    return $players;
}

function newJob($jobId, $port, $script)
{
    $scriptText = $script;

    $RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", $port);
    if ($RCCServiceSoap instanceof SoapFault) {
        $json = array("Success" => false, "Error" => "SOAP fault occurred", "Value" => 0, "ServicePort" => $port);
        exit(json_encode($json));
    }

    $job = new Roblox\Grid\Rcc\Job($jobId);

    $script = new Roblox\Grid\Rcc\ScriptExecution($jobId . "-Script", $scriptText);
    $value = $RCCServiceSoap->OpenJobEx($job, $script);

    return $value !== null ? $value : 0;
}

function closeJob($jobId, $port)
{
    $RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", $port);
    if ($RCCServiceSoap instanceof SoapFault) {
        $json = array("Success" => false, "Error" => "SOAP fault occurred", "Value" => 0, "ServicePort" => $port);
        exit(json_encode($json));
    }
    $value = $RCCServiceSoap->CloseJob($jobId);

    return $value !== null ? $value : null;
}

function renewLease($jobId, $port, $seconds)
{
    $RCCServiceSoap = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", $port);
    if ($RCCServiceSoap instanceof SoapFault) {
        $json = array("Success" => false, "Error" => "SOAP fault occurred", "Value" => 0, "ServicePort" => $port);
        exit(json_encode($json));
    }
    $value = $RCCServiceSoap->RenewLease($jobId, $seconds);

    return $value !== null ? $value : null;
}


function generateAvatarImages($userId)
{
    $RCC = new Roblox\Grid\Rcc\RCCServiceSoap("127.0.0.1", 64989);

    $path1 = $_SERVER['DOCUMENT_ROOT'] . '/Tools/RenderedUsers/' . $userId . '.png';
    $path2 = $_SERVER['DOCUMENT_ROOT'] . '/Tools/RenderedUsers/' . $userId . '-closeup' . '.png';

    $jobidNormal = "RENDER_NORMAL_" . vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
    $jobNormal = new Roblox\Grid\Rcc\Job($jobidNormal, 60);

    $jobidCloseup = "RENDER_CLOSEUP_" . vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
    $jobCloseup = new Roblox\Grid\Rcc\Job($jobidCloseup, 60);

    $scriptTextNormal = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/renders/avat.lua') . " return start(\"" . $userId . "\",\"https://rovive.pro\");";

    $scriptNormal = new Roblox\Grid\Rcc\ScriptExecution("Render", $scriptTextNormal);
    $jobResultNormal = $RCC->OpenJobEx($jobNormal, $scriptNormal);

    $scriptTextCloseup = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/renders/avatcloseup.lua') . " return start(\"" . $userId . "\");";
    $scriptCloseup = new Roblox\Grid\Rcc\ScriptExecution("Render", $scriptTextCloseup);
    $jobResultCloseup = $RCC->OpenJobEx($jobCloseup, $scriptCloseup);

    $imgNormal = base64_decode($jobResultNormal[0]);
    $imgCloseup = base64_decode($jobResultCloseup[0]);

    file_put_contents($path1, $imgNormal);
    file_put_contents($path2, $imgCloseup);
}

function execInBackground($cmd)
// for executing scripts in background, not used here, used elsewhere
{
    pclose(popen("start /B " . $cmd, 'r'));
}

function execInBackgroundWindows($filePath, $workingDirectory, $arguments)
{
    $WshShell = new COM("WScript.Shell");
    $cmd = "$filePath $arguments";
    $WshShell->Run("cmd /C \"start /B $cmd\"", 0, false);
}