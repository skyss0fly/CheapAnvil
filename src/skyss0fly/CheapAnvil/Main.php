<?php
namespace skyss0fly\CheapAnvil;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\block\inventory\AnvilInventory;
use pocketmine\player\Player;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\item\enchantment\EnchantingOption;


class Main extends PluginBase implements Listener {
private option;
    
    public function onEnable(): void {
        $this->option = EnchantingOption();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("CheapAnvil has been enabled and set Anvil Price to 0 xp");
    }

    /**
     * @param InventoryTransactionEvent $event
     */
    public function onInventoryTransaction(InventoryTransactionEvent $event): void {
        $transaction = $event->getTransaction();
        $player = null;
        $inventory = null;

        foreach ($transaction->getActions() as $action) {
            if ($action instanceof SlotChangeAction) {
                $inventory = $action->getInventory();
                if ($inventory instanceof AnvilInventory) {
                    $player = $transaction->getSource();
                    break;
                }
            }
        }

        if ($player instanceof Player && $inventory instanceof AnvilInventory) {
            // Set the experience cost to 0
            $option->$requiredXpLevel = 0;
        }
    }
}
