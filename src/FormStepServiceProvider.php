<?php

namespace Zx\Admin\FormStep;

use Zx\Admin\Extend\ServiceProvider;
use Zx\Admin\Form as BaseForm;

class FormStepServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/jquery.smartWizard.min.js',
    ];
	protected $css = [
		'css/step.css',
	];

	public function init()
	{
		parent::init();

		//
        BaseForm::macro('multipleSteps', function ($builder = null) {
            if (empty($this->context['steps'])) {
                $this->context['steps'] = new Builder($this);
            }

            if ($builder) {
                if ($builder instanceof \Closure) {
                    $builder($this->context['steps']);
                } elseif (is_array($builder)) {
                    $this->context['steps']->add($builder);
                }
            }

            return $this->context['steps'];
        });
	}
}
