<?php
namespace skyss0fly\CheapAnvil;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\block\inventory\AnvilInventory;
use pocketmine\player\Player;
use pocketmine\inventory\transaction\action\SlotChangeAction;

class Main extends PluginBase implements Listener {
    
    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("CheapAnvil has been enabled and set Anvil Price to 0 XP");
    }

    /**
     * Handle inventory transactions and reduce XP cost for anvils.
     *
     * @param InventoryTransactionEvent $event
     */
    public function onInventoryTransaction(InventoryTransactionEvent $event): void {
        $transaction = $event->getTransaction();

        foreach ($transaction->getActions() as $action) {
            if ($action instanceof SlotChangeAction) {
                $inventory = $action->getInventory();
                if ($inventory instanceof AnvilInventory) {
                    $player = $transaction->getSource();
                    if ($player instanceof Player) {
                        // Logic to set experience cost to 0.
                        $inventory->setRepairCost(0);  // Example API call
                        $this->getLogger()->info("XP cost set to 0 for player " . $player->getName());
                        break;
                    }
                }
            }
        }
    }
}
