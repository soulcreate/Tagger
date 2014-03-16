<?php
/**
 * Create a Tag
 * 
 * @package tagger
 * @subpackage processors
 */
class TaggerTagCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'TaggerTag';
    public $languageTopics = array('tagger:default');
    public $objectType = 'tagger.tag';

    public function beforeSave() {
        $name = $this->getProperty('tag');
        $group = $this->getProperty('group');

        if (empty($name) || empty($group)) {
            if (empty($group)) {
                $this->addFieldError('group',$this->modx->lexicon('tagger.err.group_name_ns'));
            }

            if (empty($name)) {
                $this->addFieldError('tag',$this->modx->lexicon('tagger.err.tag_name_ns'));
            }
        } else {
            if ($this->doesAlreadyExist(array('tag' => $name, 'group' => $group))) {
                $this->addFieldError('tag',$this->modx->lexicon('tagger.err.tag_name_ae'));
            }
        }

        return parent::beforeSave();
    }
}
return 'TaggerTagCreateProcessor';