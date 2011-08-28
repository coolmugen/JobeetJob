<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Azamat
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JobeetJobForm extends BaseJobeetJobForm
{
  public function configure()
  {
 	$this->useFields(array('category_id', 'type', 'company', 'logo', 'url', 'position', 'location', 'description', 'how_to_apply', 'is_public', 'email'));  
 	$this->removeFields();
 
    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],
      new sfValidatorEmail(),
    ));								
 	
	$this->validatorSchema['email'] = new sfValidatorAnd(array(
 		$this->validatorSchema['email'],
 		new sfValidatorEmail(),
 	));
 	
	$this->widgetSchema['type'] = new sfWidgetFormChoice(array(
		'choices'  => Doctrine_Core::getTable('JobeetJob')->getTypes(),
		'multiple' => false,
		'expanded' => true,
	));
	
	$this->validatorSchema['type'] = new sfValidatorChoice(array(
		'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
	));
	
	$this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
		'label' => 'Company logo',
	));
	
	$this->widgetSchema->setLabels(array(
		'category_id'  => 'Category',
		'is_public'    => 'Public?',
		'how_to_apply' => 'How to apply?',
		
	));
	
	$this->validatorSchema['logo'] = new sfValidatorFile(array(
		'required'   => false,
		'path'       => sfConfig::get('sf_upload_dir').'/jobs',
		'mime_types' => 'web_images',
	));  
	
	$this->widgetSchema->setHelp('is_public', 'Whether the job can also be published on affiliate websites or not.');
  }
  protected function removeFields()
  {
    unset(
      $this['created_at'], $this['updated_at'],
      $this['expires_at'], $this['is_activated'],
      $this['token']
    );
  }
}
