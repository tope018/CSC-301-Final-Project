SELECT champion_data.ChampionName, champion_data.Username, champion_data.Win, champion_data.Loss, champion.Position
FROM champion_data
JOIN champion ON champion_data.ChampionName = champion.ChampionName
WHERE champion_data.ChampionName = :championName