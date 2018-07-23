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

namespace revivalpmmp\pureentities\entity\monster\walking;

use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\nbt\tag\CompoundTag;
use revivalpmmp\pureentities\data\Data;
use revivalpmmp\pureentities\entity\monster\WalkingMonster;

class Shulker extends WalkingMonster{

	// Base created from Spider
	// TODO Lots!  Fix shell color
	// TODO Implement Peeping
	// TODO Implement Attacking
	// TODO Implement Teleport on Block Update
	// TODO Make Dyeable
	// TODO Modify Color of Head Based on Source of Spawn

	const NETWORK_ID = Data::NETWORK_IDS["shulker"];

	public function __construct(Level $level, CompoundTag $nbt){
		$this->width = Data::WIDTHS[self::NETWORK_ID];
		$this->height = Data::HEIGHTS[self::NETWORK_ID];
		$this->speed = 0;

		$this->setDamage([0, 2, 2, 3]);
		parent::__construct($level, $nbt);
	}

	public function getName() : string{
		return "Shulker";
	}

	/**
	 * Attack a player
	 *
	 * @param Entity $player
	 */
	public function attackEntity(Entity $player){
		// TODO Add Attack Function;
	}

	public function getDrops() : array{
		$drops = [];
		switch(mt_rand(0, 1)){
			case 0:
				array_push($drops, Item::get(Item::SHULKER_SHELL, 0, 1));
				break;
		}
		return $drops;
	}

	public function getMaxHealth() : int{
		return 30;
	}

	public function getXpDropAmount() : int{
		return 5;
	}


}
