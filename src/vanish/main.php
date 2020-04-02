<?php

namespace vanish;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginDescription;
use pocketmine\plugin\PluginLoader;
use pocketmine\Server;

class main extends PluginBase implements Listener{

    public function onEnable() {

        $this->getServer()->getPluginManager()->registerEvents($tihs, $this);

    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch($cmd){
            case "vanish":
                if(isset($args[0]) && $sender instanceof Player){
                    $args[0] = strtolower($args[0]);
                    switch($args[0]) {
                        case "on":
                            $eff = new EffectInstance(Effect::getEffect(Effect::INVISIBILITY), 100 * 99999, 1, false);
                            $sender->addEffect($eff);
                            $sender->sendMessage("§aVous étes invisible !");
                            $sender->setGamemode("1");
                            break;
                        case "off":
                            $sender->removeEffect(Effect::INVISIBILITY);
                            $sender->sendMessage("§cVous étes maintenant visible !");
                            $sender->setGamemode("0");
                            break;
                    }
                }
                break;
        }
        return true;
    }
}