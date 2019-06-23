<?php

namespace Anders\INSituExplosion;

use pocketmine\event\entity\EntityExplodeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener
{
    /**
     * 插件启用了！
     */
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        if (!is_dir($this->getDataFolder())) @mkdir($this->getDataFolder(), 0777, true);
        if (!file_exists($this->getDataFolder() . "config.yml")) $this->saveResource("config.yml");
    }

    /**
     * 实体爆炸事件
     * @param EntityExplodeEvent $event
     */
    public function onEntityExplode(EntityExplodeEvent $event){
        if ($this->getConfig()->get("启用爆炸保护")){
            $event->setCancelled(true);
        }
    }
}