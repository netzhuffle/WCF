<?php
namespace wcf\system\user\notification\object\type;
use wcf\data\user\trophy\UserTrophy;
use wcf\data\user\trophy\UserTrophyList;
use wcf\system\user\notification\object\UserTrophyNotificationObject;

/**
 * Represents a user trophy notification object type.
 *
 * @author	Joshua Ruesweg
 * @copyright	2001-2017 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	WoltLabSuite\Core\System\User\Notification\Object\Type
 */
class UserTrophyNotificationObjectType extends AbstractUserNotificationObjectType {
	/**
	 * @inheritdoc
	 */
	protected static $decoratorClassName = UserTrophyNotificationObject::class;
	
	/**
	 * @inheritdoc
	 */
	protected static $objectClassName = UserTrophy::class;
	
	/**
	 * @inheritdoc
	 */
	protected static $objectListClassName = UserTrophyList::class;
}
