<?php

namespace Sumflyhighlab\TextCombineNumber;

use Laravel\Nova\Fields\Field;

class TextCombineNumber extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-combine-number';
        
    /**
     * The prefix to be used when displaying the number.
     *
     * @var string
     */
    private $prefix = '';

    /**
     * The number of decimals to be displayed.
     *
     * @var int
     */
    private $decimals = 2;

    /**
     * The decimal point to be used when displaying the number.
     *
     * @var string
     */
    private $dec_point = '.';

    /**
     * The thousands separator to be used when displaying the number.
     *
     * @var string
     */
    private $thousands_sep = ' ';

    /**
     * The suffix to be used when displaying the number.
     *
     * @var string
     */
    private $suffix = '';
    
    public $textAlign='left';

     public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->decimals($this->decimals)
             ->textAlign($this->textAlign)
             ->displayUsing(function ($value) {
                 if(is_numeric($value)){
                    return ! is_null($value) ? $this->prefix.number_format($value, $this->decimals, $this->dec_point, $this->thousands_sep).$this->suffix : null;

                 }else{
                    return ! is_null($value) ? $this->prefix.$value.$this->suffix : null;

                 }
             });
    }
    
    
    /**
     * Sets the decimal point symbol to be used when displaying the number.
     *
     * @param  string  $dec_point
     *
     * @return $this
     */
    public function decimalPoint($dec_point)
    {
        $this->dec_point = $dec_point;

        return $this;
    }

    /**
     * Sets the number of decimal points to be used as well as the step value.
     *
     * @param  int  $decimals
     *
     * @return $this
     */
    public function decimals($decimals)
    {
        $this->decimals = $decimals;

        $this->step((string) (0.1 ** $this->decimals));

        return $this;
    }

    /**
     * Sets the prefix to be used when displaying the number.
     *
     * @param  string  $prefix
     *
     * @return $this
     */
    public function prefix($prefix)
    {
        $this->prefix = $prefix;
        
       $this->withMeta(['position' => 'before','text' => $prefix]);

        return $this;
    }

    /**
     * Sets the suffix to be used when displaying the number.
     *
     * @param  string  $suffix
     *
     * @return $this
     */
    public function suffix($suffix)
    {
        $this->suffix = $suffix;
        $this->withMeta(['position' => 'after','text' => $suffix]);
        return $this;
    }

    /**
     * Set the thousands separator symbol to be used when displaying the number.
     *
     * @param  string  $thousands_sep
     *
     * @return $this
     */
    public function thousandsSeparator($thousands_sep)
    {
        $this->thousands_sep = $thousands_sep;

        return $this;
    }
    
    /**
     * The minimum value that can be assigned to the field.
     *
     * @param  mixed  $min
     * @return $this
     */
    public function min($min)
    {
        return $this->withMeta(['min' => $min]);
    }

    /**
     * The maximum value that can be assigned to the field.
     *
     * @param  mixed  $max
     * @return $this
     */
    public function max($max)
    {
        return $this->withMeta(['max' => $max]);
    }

    /**
     * The step size the field will increment and decrement by.
     *
     * @param  mixed  $step
     * @return $this
     */
    public function step($step)
    {
        return $this->withMeta(['step' => $step]);
    }
    
     /**
     * Set the thousands separator symbol to be used when displaying the number.
     *
     * @param  string  $thousands_sep
     *
     * @return $this
     */
    public function textAlign($textAlign)
    {
        $this->textAlign = $textAlign;

        return $this;
    }
    
}



