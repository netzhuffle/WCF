<?php
declare(strict_types=1);
namespace wcf\data\acl\option\category;
use wcf\data\DatabaseObjectList;

/**
 * Represents a list of acl option categories.
 * 
 * @author	Alexander Ebert
 * @copyright	2001-2017 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	WoltLabSuite\Core\Data\Acl\Option\Category
 * 
 * @method	ACLOptionCategory		current()
 * @method	ACLOptionCategory[]		getObjects()
 * @method	ACLOptionCategory|null		search($objectID)
 * @property	ACLOptionCategory[]		$objects
 */
class ACLOptionCategoryList extends DatabaseObjectList {
	/**
	 * @inheritDoc
	 */
	public $className = ACLOptionCategory::class;
}
