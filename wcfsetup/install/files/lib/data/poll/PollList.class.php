<?php
declare(strict_types=1);
namespace wcf\data\poll;
use wcf\data\DatabaseObjectList;

/**
 * Represents a list of polls.
 * 
 * @author	Alexander Ebert
 * @copyright	2001-2017 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	WoltLabSuite\Core\Data\Poll
 *
 * @method	Poll		current()
 * @method	Poll[]		getObjects()
 * @method	Poll|null	search($objectID)
 * @property	Poll[]		$objects
 */
class PollList extends DatabaseObjectList {
	/**
	 * @inheritDoc
	 */
	public $className = Poll::class;
}
