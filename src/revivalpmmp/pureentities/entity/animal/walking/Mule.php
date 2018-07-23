<?php

/**
 * PureEntitiesX: Mob AI Plugin for PMMP
 * Copyright (C)  2018 RevivalPMMP
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace revivalpmmp\pureentities\entity\animal\walking;

use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use revivalpmmp\pureentities\entity\animal\WalkingAnimal;
use pocketmine\entity\Rideable;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\entity\Creature;
use revivalpmmp\pureentities\data\Data;

class Mule extends WalkingAnimal implements Rideable{
	const NETWORK_ID = Data::NETWORK_IDS["mule"];


	public function __construct(Level $level, CompoundTag $nbt){
		$this->width = Data::WIDTHS[self::NETWORK_ID];
		$this->height = Data::HEIGHTS[self::NETWORK_ID];
		parent::__construct($level, $nbt);
	}

	public function getName() : string{
		return "Mule";
	}

	public function targetOption(Creature $creature, float $distance) : bool{
		if($creature instanceof Player){
			return $creature->spawned && $creature->isAlive() && !$creature->isClosed() && $creature->getInventory()->getItemInHand()->getId() == Item::WHEAT && $distance <= 49;
		}
		return false;
	}

	public function getDrops() : array{
		return [Item::get(Item::LEATHER, 0, mt_rand(0, 2))];
	}

	public function getMaxHealth() : int{
		return 15;
	}

	public function getXpDropAmount() : int{
		return mt_rand(1, 3);
	}

	/**
	 * @return null
	 */
	public function getRidePosition(){
		return null;
	}


}
