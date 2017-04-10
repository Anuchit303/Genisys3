<?php

 /**
  *     _____            _                _____ 
  *    |  __ \          (_)              |____ |
  *    | |  \/ ___ _ __  _ ___ _   _ ___     / /
  *    | | __ / _ \ '_ \| / __| | | / __|    \ \
  *    | |_\ \  __/ | | | \__ \ |_| \__ \.___/ /
  *     \____/\___|_| |_|_|___/\__, |___/\____/ 
  *                            __/ |           
  *                           |___/            
  *
  * This program is free software: you can redistribute it and/or modify
  * it under the terms of the GNU Lesser General Public License as published by
  * the Free Software Foundation, either version 3 of the License, or
  * (at your option) any later version.
  *
  * @author FrontierDevs
  * @see Genisys3.org
  */

namespace pocketmine\entity;

use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\Player;


class Camera extends Monster{
	const NETWORK_ID = 104;

	public $width = 0.6;
	public $length = 0.6;
	public $height = 1.8;
	
	public function getName() : string{
		return "Evoker";
	}
	
	public function spawnTo(Player $player){
		$pk = new AddEntityPacket();
		$pk->eid = $this->getId();
		$pk->type = Evoker::NETWORK_ID;
		$pk->x = $this->x;
		$pk->y = $this->y;
		$pk->z = $this->z;
		$pk->speedX = $this->motionX;
		$pk->speedY = $this->motionY;
		$pk->speedZ = $this->motionZ;
		$pk->yaw = $this->yaw;
		$pk->pitch = $this->pitch;
		$pk->metadata = $this->dataProperties;
		$player->dataPacket($pk);
		parent::spawnTo($player);
	}
	
	public function getDrops(){
		return [];
	}
}
