<?php

namespace LunarMoon72\CeFormTest;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase {
   public function onEnabled(){
    $this->getLogger()->info("Plugin Enabled");
   }

   public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
        switch($cmd->getName()){
          case "ceedit":
            if($sender instanceof Player){
                $this->form($sender);
            } else {
                $this->getLogger()->info("dum dum a form cant be sent to a console. Join this time uwu");
            }
       return true;
       
   }
   public function form($player){
       $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
       $ce = $this->getServer()->getPluginManager()->getPlugin("PiggyCustomEnchants");
       $form = $api->createSimpleForm(function (Player $player, int $data = null){
           $result = $data;
           if($result === null){
               return true;
           }
           switch($result){
               case 0;
                 $server->dispatchCommand(new ConsoleCommandSender(), 'ce enchant autorepair 5' $player);
               break;
              
               case 1;
                 $server->dispatchCommand(new ConsoleCommandSender(), 'ce enchant driller 5' $player);
               break;

               case 2;
                 $server->dispatchCommand(new ConsoleCommandSender(), 'ce enchant harvest 5' $player);
               break;
           }

       });
       $form->setTitle("Choose an enchant");
       $form->addButton("AutoRepair");
       $form->addButton("Driller");
       $form->addButton("Harvest");
       $form->sendToPlayer($player);
   return true;
   }
}
