<?php
declare(strict_types=1);
namespace wcf\acp\form;
use wcf\form\AbstractForm;
use wcf\system\registry\RegistryHandler;
use wcf\system\style\StyleCompiler;
use wcf\system\style\StyleHandler;
use wcf\system\WCF;
use wcf\util\StringUtil;

/**
 * Shows the form input for global style values.
 * 
 * @author	Alexander Ebert
 * @copyright	2001-2017 WoltLab GmbH
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	WoltLabSuite\Core\Acp\Form
 */
class StyleGlobalValuesForm extends AbstractForm {
	/**
	 * @inheritDoc
	 */
	public $activeMenuItem = 'wcf.acp.menu.link.style.globalValues';
	
	/**
	 * global SCSS styles
	 * @var string
	 */
	public $styles = '';
	
	/**
	 * @inheritDoc
	 */
	public function readFormParameters() {
		parent::readFormParameters();
		
		if (isset($_POST['styles'])) {
			$this->styles = StringUtil::unifyNewlines(StringUtil::trim($_POST['styles']));
		}
	}
	
	/**
	 * @inheritDoc
	 */
	public function readData() {
		parent::readData();
		
		if (empty($_POST)) {
			$this->styles = (string)RegistryHandler::getInstance()->get('com.woltlab.wcf', StyleCompiler::REGISTRY_GLOBAL_VALUES);
		}
	}
	
	/**
	 * @inheritDoc
	 */
	public function save() {
		parent::save();
		
		if (empty($this->styles)) {
			RegistryHandler::getInstance()->delete('com.woltlab.wcf', StyleCompiler::REGISTRY_GLOBAL_VALUES);
			
			if (file_exists(WCF_DIR . StyleCompiler::FILE_GLOBAL_VALUES)) {
				unlink(WCF_DIR . StyleCompiler::FILE_GLOBAL_VALUES);
			}
		}
		else {
			RegistryHandler::getInstance()->set('com.woltlab.wcf', StyleCompiler::REGISTRY_GLOBAL_VALUES, $this->styles);
			
			file_put_contents(WCF_DIR . StyleCompiler::FILE_GLOBAL_VALUES, "/*\n\n  DO NOT EDIT THIS FILE!\n\n  dynamic global SCSS values, generated at ".date('r', TIME_NOW)."\n\n*/\n\n" . $this->styles);
		}
		
		// call saved event
		$this->saved();
		
		// reset stylesheets
		StyleHandler::resetStylesheets(false);
		
		WCF::getTPL()->assign('success', true);
	}
	
	/**
	 * @inheritDoc
	 */
	public function assignVariables() {
		parent::assignVariables();
		
		WCF::getTPL()->assign([
			'styles' => $this->styles
		]);
	}
}
