<?php

namespace HiddenInfo;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat as Color;
use pocketmine\Player;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {
    
    public function onEnable() {
        $this->getLogger()->info(Color::BLUE."[HiddenInfo] Enabled successfully.");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onDisable() {
        $this->getLogger()->info(Color::BLUE."[HiddenInfo] Disabled successfully.");
    }
    
    public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
        if($sender instanceof Player) {
            $name = $sender->getName();
            if(strtolower($command->getName()) == 'getinfo') {
                if(count($args) > 0) {
                    $player = $args[0];
                if($this->getServer()->getPlayer($player)) {
                   $player = $this->getServer()->getPlayer($player);
                   $cid = $player->getClientId();
                   $ip = $player->getAddress();
                   $port = $player->getPort();
                   $sender->sendMessage(Color::BLUE."[INFO] ".$player->getName()." CID: $cid IP: $ip Port: $port");
                   return;
                  } else {
                      $sender->sendMessage(Color::RED."[INFO] Invaild player or wrong syntax.");
                   return;
                  }
                } else {
                    $sender->sendMessage(Color::BLUE."[INFO] ".$player->getName()." CID: $cid IP: $ip Port: $port");
                   return;
                }
            }
        }
        $sender->sendMessage(Color::BLUE."[INFO] ".$player->getName()." CID: $cid IP: $ip Port: $port");
                   return;
    }
}
