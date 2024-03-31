
function start(userId,baseurl)
    print("Renderin user" .. userId)
    pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseurl) end)
    game:GetService("ScriptContext").ScriptsDisabled = true
    local plr = game.Players:CreateLocalPlayer(0)
    local BaseUrl = game:GetService("ContentProvider").BaseUrl:lower()
    game:GetService('ThumbnailGenerator').GraphicsMode = 6;
    plr.CharacterAppearance = "https://www.rovive.pro/Asset/characterfetch.ashx?userId="..userId
    plr:LoadCharacter(false)
    for i,v in pairs(plr.Character:GetChildren()) do
        print(v)
        if v:IsA("Tool") then
            plr.Character.Torso["Right Shoulder"].CurrentAngle = math.pi / 2
        end
    end

    return game:GetService("ThumbnailGenerator"):Click("PNG", 768, 768, true)

end