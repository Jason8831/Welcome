<?php

namespace Jason8831\Welcome\Events;

use Jason8831\Welcome\Main;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\Server;
use pocketmine\utils\Config;

class PlayerJoinEvents implements Listener
{

    public function OnJoin(PlayerJoinEvent $event)
    {
        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);

        $player = $event->getPlayer();
        $event->setJoinMessage(" ");

        if(!$player->hasPlayedBefore()) {
            $messagefirst = str_replace("{player}", $player->getName(), $config->get("firstJoin"));
            Server::getInstance()->broadcastMessage($messagefirst);
        }else{
            $message = str_replace("{player}", $player->getName(), $config->get("Join"));
            Server::getInstance()->broadcastMessage($message);
        }
    }

}