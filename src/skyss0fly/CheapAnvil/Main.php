<?php
namespace skyss0fly\CheapAnvil;

use pocketmine\item\enchantment\EnchantmentOption;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

public function onEnable(EnchantmentOption $enc):void {
$enc->requiredXpLevel = 0;
  $this->getLogger()->info("CheapAnvil has set Anvil Price to 0 xp");
  
  return true;
  
}
}
