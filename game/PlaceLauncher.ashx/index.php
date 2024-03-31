<?php
header('Content-Type: text/plain');
header('Content-Type: application/json; charset=utf-8');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

if (isset($_GET['placeId'])) {
    
    // Validate if it is a positive integer
    $placeId = $_GET['placeId'];
    if (ctype_digit($placeId) && $placeId > 0) {
        echo "";
    } else {
        die("Invalid placeId");
    }

} else {
    die("Put a placeId :pray:");
}

try {
    require_once $_SERVER["DOCUMENT_ROOT"] . "/SOAP.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/main.php";

    $authticket = isset($_COOKIE["_ROBLOSECURITY"]) ? $_COOKIE["_ROBLOSECURITY"] : "";

    $authclass = new Auth;
    $userclass = new User;
    $gameclass = new Game;
    $jobClass = new Jobs;

    $ticket = $authclass->validateToken($authticket);

    if (!$ticket) {
        $data = array('status' => 8, 'jobId' => null, 'joinScriptUrl' => null, 'authenticationUrl' => 'https://www.rovive.pro/Login/Negotiate.ashx', 'authenticationTicket' => null, 'message' => 'Authenticatin failed.');
        exit;
    }

    $user = $userclass->getUser($ticket["user_id"]);

    $placeid = isset($_GET["placeId"]) ? intval($_GET["placeId"]) : 1;

    $gamestatus = 6;

    $gameid = $placeid;


    $game = $gameclass->getGame($gameid);

    $type = $game["game_type"];

    $message = null;

    $jobid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));

    $jobIdProvided = isset($_GET["jobId"]) ? $_GET["jobId"] : false;

    $job = null;
    if ($user["ongoing_action_id"] == null) {
        if (!$jobIdProvided) {
            if (!$jobClass->getBestJobForPlaceId($gameid)) {

                $port = rand(53640, 63640);

                while (isPortUsed($port)) {
                    $port = rand(53640, 63640);
                }

                $gamerandomport = $port;

                $ip = "45.11.229.121";
                $serviceport = "64989";


                $placeversion = 0;
                $creatorid = $game["creator_id"];
                $MaxPlayers = $game["server_size"];
                $placeId = $gameid;
                $gameName = $game["title"];

                if (!isPortUsed($serviceport)) {
                    execInBackgroundWindows("C:\\RCC2016\\RCCService.exe", "C:\\RCC2016\\", "-console");
                }

                while (!isPortUsed($serviceport)) {
                    sleep(1);
                }

                $jobClass->createJob($jobid, $ip, $gamerandomport, $gameid);

                $scriptText = '
            pcall(function() settings().Network.UseInstancePacketCache = true end)
            pcall(function() settings().Network.UsePhysicsPacketCache = true end)
            pcall(function() settings()["Task Scheduler"].PriorityMethod = Enum.PriorityMethod.AccumulatedError end)
            settings().Network.PhysicsSend = Enum.PhysicsSendMethod.TopNErrors
            settings().Network.ExperimentalPhysicsEnabled = true
            settings().Network.WaitingForCharacterLogRate = 100
            pcall(function() settings().Diagnostics:LegacyScriptMode() end)
            local assetId = ' . $placeId . '
            local url = "https://www.rovive.pro/"
            local scriptContext = game:GetService(\'ScriptContext\')
            scriptContext.ScriptsDisabled = true
            game:SetPlaceID(' . $placeId . ', true)
            game:GetService("ChangeHistoryService"):SetEnabled(false)
            local ns = game:GetService("NetworkServer")
    
            if url~=nil then
            pcall(function() game:GetService("Players"):SetAbuseReportUrl(url .. "/AbuseReport/InGameChatHandler.ashx") end)
            pcall(function() game:GetService("ScriptInformationProvider"):SetAssetUrl(url .. "/Asset/") end)
            pcall(function() game:GetService("ContentProvider"):SetBaseUrl(url .. "") end)
            pcall(function() game:GetService("Players"):SetChatFilterUrl(url .. "/Game/ChatFilter.ashx") end)
            game:GetService("BadgeService"):SetPlaceId(' . $placeId . ')
            game:GetService("BadgeService"):SetHasBadgeUrl(url .. "/game/Badge/HasBadge.ashx?UserID=%d&BadgeID=%d")
            game:GetService("BadgeService"):SetIsBadgeLegalUrl("")
            game:GetService("BadgeService"):SetAwardBadgeUrl(url .. "assets/award-badge?userId=%d&badgeId=%d&placeId=%d")
            game:GetService("InsertService"):SetBaseSetsUrl(url .. "/game/Tools/InsertAsset.ashx?nsets=10&type=base")
            game:GetService("InsertService"):SetUserSetsUrl(url .. "/game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
            game:GetService("InsertService"):SetCollectionUrl(url .. "/game/Tools/InsertAsset.ashx?sid=%d")
            game:GetService("InsertService"):SetAssetUrl(url .. "/Asset/?id=%d")
            game:GetService("InsertService"):SetAssetVersionUrl(url .. "/Asset/?assetversionid=%d")
            pcall(function() game:GetService("SocialService"):SetFriendUrl(url .. "/game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
            pcall(function() game:GetService("SocialService"):SetBestFriendUrl(url .. "/game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
            pcall(function() game:GetService("SocialService"):SetGroupUrl(url .. "/game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
            pcall(function() game:GetService("SocialService"):SetGroupRankUrl(url .. "/game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
            pcall(function() game:GetService("SocialService"):SetGroupRoleUrl(url .. "/game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)
            pcall(function() game:GetService("GamePassService"):SetPlayerHasPassUrl(url .. "/game/GamePass/GamePassHandler.ashx?Action=HasPass&UserID=%d&PassID=%d") end)
            pcall(function() game:GetService("MarketplaceService"):SetProductInfoUrl(url .. "/marketplace/productinfo?assetId=%d") end)
            pcall(function() game:GetService("MarketplaceService"):SetDevProductInfoUrl(url .. "/marketplace/productDetails?productId=%d") end)
            pcall(function() game:GetService("MarketplaceService"):SetPlayerOwnsAssetUrl(url .. "/ownership/hasasset?userId=%d&assetId=%d") end)
            pcall(function() game:SetPlaceVersion(' . $placeversion . ') end)
            pcall(function() game:SetVIPServerOwnerId(68816760) end)
            pcall(function() game:SetCreatorID(' . $creatorid . ', Enum.CreatorType.User) end)
            game:GetService("Players"):SetSysStatsUrl(url .. "/AbuseReport/sysstats")
            pcall(function() game:GetService("NetworkServer"):SetIsPlayerAuthenticationRequired(true) end)
            game:GetService("Players").MaxPlayersInternal = ' . $MaxPlayers . '
            local MaxCount = game:GetService("Players").MaxPlayers
            end
            settings().Diagnostics.LuaRamLimit = 500
            game:Load(url .. "/asset/?id=' . $placeId . '&gamefetch=true")
            local port = ' . $port . '
            ns:Start(port)
            scriptContext:SetTimeout(10)
            scriptContext.ScriptsDisabled = false
    
            game:GetService("RunService"):Run()
            
            local apiKey = "doyousuckdicks?123idkmanidont"
            game.Name = " ' . htmlspecialchars($gameName) . ' "
            function checkPlayerLoop()
                -- while loop to check if there are any players after lots of seconds and fires a job close api request
                wait(30)
                while true do
                    if #game:GetService("Players"):GetPlayers() == 0 then
                        print("[Server]: Closing Job: " .. game.JobId)
                        pcall(function() game:HttpGet("https://www.rovive.pro/rccApi/closeJob?jobId="..game.JobId.."&apiKey="..apiKey) end)
                        pcall(function() ns:Stop() end)
                    end
                    wait(1)
                end
            end
    
            function pingLoop()
                -- while loop to send ping requests
                wait(5)
                while true do
                    pcall(function() game:HttpGet("https://www.rovive.pro/rccApi/jobPing?jobId="..game.JobId.."&apiKey="..apiKey) end)
                    pcall(function() sendPlayerCount() end)
                    wait(5)
                end
            end
    
            function sendPlayerCount()
                local players = ""
                for i,v in pairs(game.Players:GetChildren()) do
                    if v:IsA("Player") then
                        if #game.Players:GetChildren() > 1 then
                            players = players..","..v.userId
                        else
                            players = v.userId
                        end
                    end
                end
    
                pcall(function() game:HttpGet("https://www.rovive.pro/rccApi/jobSetPlayerCount?jobId="..game.JobId.."&apiKey="..apiKey.."&players="..players) end)
            end
    
            -- functions to fire when player joins or leaves
            game.Players.ChildAdded:connect(function()
                pcall(function() sendPlayerCount() end)
            end)
            game.Players.ChildRemoved:connect(function()
                pcall(function() sendPlayerCount() end)
            end)
			
			
			
    
            spawn(checkPlayerLoop)
            spawn(pingLoop)
    
            return port
            ';

                $value = newJob($jobid, $serviceport, $scriptText);
                $renew = renewLease($jobid, $serviceport, 999999999);
            }

            $job = $jobClass->getBestJobForPlaceId($gameid);
        } else {
            $job = $jobClass->getJob($jobIdProvided);
        }
    }


    $jobid = $job["jobId"];

    function jobOffline($serviceport, $jobid, $job)
    {
        global $jobClass;
        $timediff = time() - $job['lastPingTime'];
        if ($timediff > 60) {
            $jobClass->deleteJob($jobid);

            closeJob($jobid, $serviceport);

            return true;
        }
    }


    // game is banned, what did you do.
    if ($game['status'] == "disabled") {
        $gamestatus = 3;
    }
    // game is private, don't let them in, this needs to be implemented in logindata.php (contains validate-place-join)
    if ($game['status'] == "private") {
        $gamestatus = 3;
    }

    // Is the game active? if not, set status to 0, which'll make the client wait (waiting for available server or server found, loading) if it is, when the client retries it'll let them through
    if ($jobClass->getJob($jobid) && $jobClass->getJob($jobid)['active'] == 1) {
        $gamestatus = 2;
    } else {
        if ($type == 2018 || $type == 2020) {
            $gamestatus = 1;
        } else {
            $gamestatus = 0;
        }
    }

    if (jobOffline(64989, $jobid, $job)) {
        $gamestatus = 4;
    }

    // banned. game is disabled message, don't worry join.ashx refuses to give a response if you are banned.
    if ($user['ongoing_action_id'] > 0) {
        $gamestatus = 3;
    }

    if ($type == 2018 || $type == 2020) {
        $type = "&type=" . $type;
    }


    $array = array(
        "jobId" => $jobid,
        "status" => $gamestatus,
        "joinScriptUrl" => "http://www.rovive.pro/Game/Join.ashx?placeId=" . $placeid,
        "authenticationUrl" => "http://www.rovive.pro/Login/Negotiate.ashx",
        "authenticationTicket" => $authticket,
        "message" => $message
    );

    exit(json_encode($array, JSON_UNESCAPED_SLASHES));
} catch (Throwable $e) {
    $array = [
        "jobId" => $jobid,
        "status" => 4,
        "joinScriptUrl" => null,
        "authenticationUrl" => "http://www.rovive.pro/Login/Negotiate.ashx",
        "authenticationTicket" => $authticket,
        "message" => $type . " Unknown Error " . $e
    ];
    echo json_encode($array, JSON_PRETTY_PRINT);
    // okay what the fuck some probably huge error happened, try and kill the rcc instances, that's our only huge concern, the site will remove
    // any job that hasnt been pinged after 60 seconds when someone tries to view it anyway.
    //rccStop($serviceport);
    //rccStop2018($serviceport);
    //rccStop2020($serviceport);
    exit();
}
